<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Update Customer Information</div>
          <form>
            <br />
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
              <div class="col-md-6">
                <input
                  id="name"
                  type="text"
                  class="form-control"
                  v-model="customer.name"
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
                  v-model="customer.phone"
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
                  v-model="customer.address"
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
                  @click.prevent="customerDataUpdate()"
                  name="add"
                  value="Update"
                />
              </div>
            </div>
          </form>
          <hr />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["customer"],
  data() {
    return {
      customers: [],
      name: "",
      phone: "",
      address: ""
    };
  },
  mounted() {
    console.log(this.customer);
  },
  methods: {
    customerDataUpdate() {
      axios
        .post("/customer/update/" + this.customer.id, {
          name: this.customer.name,
          phone: this.customer.phone,
          address: this.customer.address
        })
        .then(function(response) {
          console.log(response, "then");
          location = "/customer";
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
