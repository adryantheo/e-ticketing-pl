<template>
   <v-card>
      <v-toolbar>
         <v-card-text>
            <v-toolbar-title>
               <h3>Beli Tiket</h3>
            </v-toolbar-title>
         </v-card-text>
      </v-toolbar>
      <v-form ref="form_order_ticket" @submit.prevent="orderTicket">
         <v-select
         v-model="is_vip"
         :items="premium"
         item-value=""
         label="jenis tiket"
         ></v-select>
      </v-form>
   </v-card>
</template>
<script>
export default {
   data: () =>({
      loading: false,
      name: gelarbudaya,
      quantity: null,
      is_vip: null,
      product_id:null,
   }),
   methods: {
      async orderTicket(){
        if(this.$refs.form_order_ticket.validate()){
           this.loading = true
           try{
            const email = localStorage.getItem('Email')
            const res = await axios.post('/api/ticket', {
               name: this.name,
               email: this.email,
               quantity: this.quantity,
               product_id:this.product_id
            }),
           }catch(err){
              console.log(err)
           }
        }
      },
      is_vip(){
         return axios.get('/api/product')
         .then(response => this.premium = response.data)
      }
   },
   mounted() {
      this.is_vip()
   },
}
</script>