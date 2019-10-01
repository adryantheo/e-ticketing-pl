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
               <v-flex v-if="ticket < 1">
                  <v-card>
                     <v-card-text class="text-xs-center">
                        <h2>Anda Belum Memiliki Tiket</h2>
                        <v-btn round outline color="info">
                           beli sekarang
                        </v-btn>
                     </v-card-text>
                  </v-card>
               </v-flex>
               <v-flex class="text-xs-center" lg4 xl4  v-else style="max-width:300">
                  <v-card >
                     <v-flex class="text-xs-center">
                        <v-card-text >
                           <qr-code 
                           text="qrcode"
                           :options="{ width: 200 }"
                           ></qr-code>
                        </v-card-text>
                     </v-flex>
                     <!-- <v-card-text>
                        <h2>Event: {{name}}</h2>
                        <h2>Jumlah Tiket: {{quantity}}</h2>
                     </v-card-text> -->
                  </v-card>
               </v-flex>
            </v-layout>
         </v-container>
      </template>
   </v-container>
</template>
<script>
export default {
   props: {
      text:undefined
   },
   data:()=>({
      loading:false,
      ticket:[],
      name: "",
      quantity: "",
      // qrcode: ""
   }),
   methods: {
      fetchTicket(){
         const email = localStorage.getItem('Email')
         return axios.get(`/api/ticket/${email}`)
      },
      async getTicket(){
         this.loading = true
         try{
            const res = await this.fetchTicket()
            const ticket = res.data
            this.name = ticket.name
            this.quantity = ticket.quantity
            // this.qrcode = ticket.qr_codes.qr_code
         }catch(err){
            console.log(err)
         }
         this.loading = false
      }
   },
   mounted() {
      this.getTicket()
   },
}
</script>