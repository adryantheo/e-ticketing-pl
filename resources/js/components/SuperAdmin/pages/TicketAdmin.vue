<template>
   <v-container grid-list-lg>
      <v-layout row wrap v-if="loading">
         <v-flex class="text-xs-center">
            <v-progress-circular
            indeterminate
            color="primary"
            :width="7"
            :size="70"
            ></v-progress-circular>
         </v-flex>
      </v-layout>
      <template v-else>
         <v-layout>
            <v-flex></v-flex>
         </v-layout>
         <v-alert
         v-model="alert"
         type="success"
         dismissible
         >
         Status Pembayaran Berhasil diubah
         </v-alert>
         <v-data-table
         :headers="headers"
         :items="items"
         :loading="loading"
         disable-intial-sort
         row-per-pages-text="Baris Per Halaman"
         >
         <template v-slot:items="props">
            <td> {{props.item.id}} </td>
            <td> {{props.item.name}} </td>
            <td> {{props.item.email}} </td>
            <td> {{props.item.quantity}} </td>
            <td> 
               <p v-if="props.item.is_vvip">Premium</p>
               <p v-else-if="props.item.is_vip">VIP</p>
               <p v-else>Reguler</p>
            </td>
            <td> {{props.item.image}} </td>
            <td> 
               <v-btn round outline v-if="!props.item.is_paid" :loading="btnLoading" @click="paid(props.item.id)">
                  UnPaid
               </v-btn>
               <v-btn @click="paidSuccess" round outline v-else>
                  Paid
               </v-btn>
            </td>
         </template>
         </v-data-table>
      </template>
   </v-container>
</template>
<script>
export default {
   data: () =>({
      loading: false,
      items: [],
      headers: [
         {text: "ID", value: "id", sortable:  false},
         {text: "Nama Pemesan", value: "name"},
         {text: "E-Mail", value: "email"},
         {text: "Jumlah Tiket", value: "quantity"},
         {text: "Kategori", value: ""},
         {text: "Bukti Pembayaran", value:"image"},
         {text: "Status Pembayaran", value: "is_paid"},
      ],
      is_paid: 1,
      alert:false,
      btnLoading: false
   }),
   methods: {
      fetchTickets(){
         return axios.get('/api/ticket')
      },

      async getTicket(){
         this.loading = true;
         try{
            const res = await this.fetchTickets()
            this.items  = res.data.map(item => ({
               id: item.id,
               name: item.name,
               email: item.email,
               quantity: item.quantity,
               image: item.image,
               is_vip: item.is_vip,
               is_vvip: item.is_vvip,
               is_paid: item.is_paid,
            }))
         }catch(err){
            console.log(err)
         }this.loading = false
      },
      async paid(id){
         this.btnLoading = true
         try{
            const res = await axios.patch(`/api/ticket/${id}/paid`,{
               is_paid: this.is_paid
            })
            this.getTicket()
            console.log(res)
            this.alert = true
         }catch(err){
            console.log(err)
         }
         this.btnLoading = false
      },
      paidSuccess(){
         swal({
            title: "Tiket sudah dibayar",
            icon: "success",
         })
      }
   },
   mounted() {
      this.getTicket()
   },
}
</script>