<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Customer Information</div>
          <form>
            <br />
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
              <div class="col-md-6">
                <input
                  id="name"
                  type="text"
                  class="form-control"
                  v-model="name"
                  required
                  autocomplete="name"
                  autofocus
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
              <div class="col-md-6">
                <input
                  id="phone"
                  type="text"
                  class="form-control"
                  v-model="phone"
                  required
                  autocomplete="phone"
                  autofocus
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
              <div class="col-md-6">
                <input
                  id="address"
                  type="text"
                  class="form-control"
                  v-model="address"
                  required
                  autocomplete="address"
                  autofocus
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right"></label>
              <div class="col-md-6">
                <input
                  type="submit"
                  class="btn btn-success btn-block"
                  @click.prevent="customerDataSave()"
                  name="add"
                />
              </div>
            </div>
          </form>
          <hr />
          <h2 class="text-primary">Customer List</h2>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
            <tr v-for="customer in customers">
              <td>{{customer.name }}</td>
              <td>{{customer.phone }}</td>
              <td>{{customer.address }}</td>
              <td>
                <a :href="'/customer/edit/'+customer.id">Edit</a>
                <a href="javascript:;" @click.prevent="customerDelete(customer.id, index)">Delete</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      customers: {},
      name: "",
      phone: "",
      address: ""
    };
  },
  mounted() {
    //console.log("Component mounted.");
    this.getData();
  },
  methods: {
    customerDataSave() {
      //console.log("Clicked on customer add form");
      axios
        .post("/customer/save", {
          name: this.name,
          phone: this.phone,
          address: this.address
        })
        .then(function(response) {
          console.log(response, "then");
          location = "/customer";
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getData() {
      axios
        .get("/customer/show")
        .then(response => {
          this.customers = response.data;
          console.log(this.customers);
        })
        .then(function(response) {
          // handle success
          console.log(response);
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        })
        .finally(function() {
          // always executed
        });
    },
    customerDelete(id, index) {
      alert("are you want to delete this?");
      axios
        .post("customer/delete/" + id, {})
        .then(function(response) {
          //this.customers.data.splice(index, id);
          location.reload();
        })
        .catch(function(error) {
          console.log(error, "eorro");
        });
    }
  }
};
</script>
