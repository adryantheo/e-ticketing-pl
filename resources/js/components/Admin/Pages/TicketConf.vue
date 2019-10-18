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
            <p class="headline">Tiket</p>
         </v-layout>
         <v-alert
         v-model="alert"
         dismissible
         type="success"
         ></v-alert>
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
               <p v-if="props.item.is_vip">VIP</p>
               <p v-else-if="props.item.is_vvip">VVIP</p>
               <p v-else>Reguler</p>
            </td>
            <td> 
               <v-img @click="openImage(props.item.email)" v-if="props.item.image" :src="props.item.image"></v-img>
               <p v-else>Belum Ada Bukti Transferl</p>
            </td>
            <td>
               <v-btn round outline v-if="!props.item.is_paid" @click="paid">
                  UnPaid
               </v-btn>
               <v-btn round outline v-else @click="paidSuccess">
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
         {text: "Bukti Transfer", value: "image"},
         {text: "Status Pembayaran", value: "is_paid"},
      ],
      alert: false,
      dialogViewImage:false,
      ticketEmail: 0
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
               is_vip: item.is_vip,
               is_vvip: item.is_vvip,
               is_paid: item.is_paid,
               image: item.image
            }))
         }catch(err){
            console.log(err)
         }this.loading = false
      },
      paidSuccess(){
         swal({
            title: "Tiket Sudah Lunas",
            icon: "success"
         })
      },
   },
   mounted() {
      this.getTicket()
   },
}
</script>