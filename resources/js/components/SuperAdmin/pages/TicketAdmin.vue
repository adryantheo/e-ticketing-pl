<template>
   <v-container grid-list-lg>
      <v-layout row wrap v-if="loading">
         <v-flex class="text-xs-center">
            <v-progress-circular
            indeterminate
            :size="70"
            :width="7"
            ></v-progress-circular>
         </v-flex>
      </v-layout>
      <div v-else>
         <v-layout>
            <v-flex>
               <h1>Daftar Tiket</h1>
            </v-flex>
         </v-layout>
         <v-data-table
         :headers="headers"
         :items="items"
         :loading="loading"
         rows-per-pages-text="Baris per halaman"
         >
         <template v-slot:items="props">
            <td>{{props.item.id}}</td>
            <td> {{props.item.name}} </td>
            <td> {{props.item.email}} </td>
            <td> {{props.item.phone}} </td>
            <td> {{props.item.is_paid}} </td>
         </template>
         </v-data-table>
      </div>
   </v-container>
</template>
<script>
export default {
   data: ()=> ({
      loading:false,
      items: [],
      headers: [
         {text: "ID", value:"id"},
         {text: "Nama Pemesan", value: "name"},
         {text: "E-Mail", value: "email"},
         {text: "Contac Person", value: "phone"},
         {text: "Status", value: "is_paid"}
      ]
   }),
   methods: {
      fetchTicket(){
         return axios.get('/api/ticket')
      },
      async getTicket(){
         this.loading = true
         try{
            const res = await this.fetchTicket()
            const items = res.data.map(item=> ({
               id: this.id,
               name: this.name,
               email: this.email
               
            }))
         }catch(err){
            swal(
               "",
               "",
               "error"
            )
            console.log(err)
         }
      }
   },
   mounted() {
      this.getTicket()
   },
}
</script>