<template>
   <v-card>
      <v-toolbar>
         <v-toolbar-title>Order Tiket</v-toolbar-title>
         <v-spacer></v-spacer>
         <v-btn color="error" flat icon  @click="$emit('close')">
            <v-icon>fa fa-times</v-icon>
         </v-btn>
      </v-toolbar>
      <v-form ref="form_order_tikcet" @submit.prevent="orderTicket">
         <v-select
         item-text="product"
         ></v-select>
      </v-form>
   </v-card>
</template>
<script>
import { async } from 'q'
export default {
   data: () => ({
      price: null,
      product: [],
      name: "Pangelaran Budaya 2019",
   }),

   methods: {
      async orderTicket(){
         this.loading = true
         try{
            const email = localStorage.getItem(email)
            const res = await axios.post(`/api/ticket`,{
               email: this.email,
               name: this.name,
               quantity: this.quantity,
               price:this.price
            })
         }catch(err){
            console.log(err)
         }
      },
      async getProduct(){
         // 
      }
   },
   mounted() {
      // 
   },
}
</script>