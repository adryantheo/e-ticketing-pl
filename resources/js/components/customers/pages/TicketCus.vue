<template>
   <v-container>
      <v-layout v-if="loading" class="text-xs-center">
         <v-flex>
            <v-progress-circular
            :size="70"
            :width="7"
            indeterminate
            ></v-progress-circular>
         </v-flex>
      </v-layout>
      <template v-else>
         <v-container grid-list-lg >
            <v-layout row wrap align-center justify-center v-if="!ticket"> 
               <v-flex >
                  <v-card>
                     <v-card-text class="text-xs-center">
                        <h2>Anda Belum Memiliki Tiket</h2>
                        <v-btn @click="openDialogOrderTicket" round outline color="info">
                           beli sekarang
                        </v-btn>
                     </v-card-text>
                  </v-card>
               </v-flex>
            </v-layout>
            <v-layout>
               <v-flex v-for="(item, i) in productTicket" :key="`am-${i}`">
                  <v-card>
                     <v-card-text>
                        {{name}}
                     </v-card-text>
                     <v-card-text>
                        <v-img>
                           <qr-code :text="item.qr_codes"></qr-code>
                        </v-img>
                     </v-card-text>
                  </v-card>
               </v-flex>
            </v-layout>
         </v-container>
      </template>
      <v-dialog v-model="dialogOrderTicket" max-width="600" persistent>
         <dialog-order-ticket
         @close="closeTicket"
         ></dialog-order-ticket>
      </v-dialog>
   </v-container>
</template>
<script>
import DialogOrderTicket from '../dialog/DialogOrderTicket'
export default {
   components: {
      DialogOrderTicket
   },
   data:()=>({
      loading:false,
      ticket: [],
      name: "",
      dialogOrderTicket: false,
      qr_codes: "",
      productTicket: [],
      qr_codes: ""
   }),
   methods: {
      openDialogOrderTicket(){
         this.dialogOrderTicket = true
      },
      closeTicket(){
         this.dialogOrderTicket = false
      },
      fetchAllTicket(){
         // const email = localStorage.getItem('Email')
         return axios.get(`/api/ticket/superadmon@mail.com`)
      },
      async getAllTicket(){
         this.loading = true;
         try{
            const res = await this.fetchAllTicket()
            const ticket = res.data
            this.name = ticket.name
            this.productTicket = ticket.qr_codes.reverse()
         }catch(err){
            console.log(err)
         }this.loading = false
      }
   },
   mounted() {
      this.getAllTicket()
   },
}
</script>