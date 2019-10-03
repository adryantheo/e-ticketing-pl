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
            <v-layout row wrap align-center justify-center> 
               <v-flex>
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
      ticket: 0,
      name: "",
      quantity: "",
      dialogOrderTicket: false
   }),
   methods: {
      openDialogOrderTicket(){
         this.dialogOrderTicket = true
      },
      closeTicket(){
         this.dialogOrderTicket = false
      }
   }
}
</script>