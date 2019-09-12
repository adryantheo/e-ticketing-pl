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
      <template>
         <v-layout>
            <v-flex></v-flex>
         </v-layout>
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
            <td> {{props.item.is_vip}} </td>
            <td> {{props.item.is_paid}} </td>
            <td>
               <v-btn>
                  Konfirmasi Pembayaran
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
         {text: "ID", value: "id"},
         {text: "Nama Pemesan", value: "name"},
         {text: "E-Mail", value: "email"},
         {text: "Jumlah Tiket", value: "quantity"},
         {text: "Kategori", value: "is_vip"},
         {text: "Status Pembayaran", value: "is_paid"},
         {text: "Aksi", value: ""}
      ]
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
               is_paid: item.is_paid
            }))
         }catch(err){
            console.log(err)
         }this.loading = false
      }
   },
   mounted() {
      this.getTicket()
   },
}
</script>