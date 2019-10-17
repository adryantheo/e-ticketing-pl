<template>
    <v-container grid-list-lg fill-height>
        <v-layout v-if="loading">
            <v-flex class="text-xs-center">
                <v-progress-circular
                :size="70"
                :width="7"
                color="primary"
                indeterminate
                ></v-progress-circular>
            </v-flex>
        </v-layout>
        <template v-else v-for="(item, i) in productTicket">
            <v-layout :key="`am-${i}`">
                <v-flex v-if="!!item.qr_codes" style="max-height:100px">
                    <v-card>
                        <v-flex>
                            <v-card-text>
                                <qr-code :text="item.qr_codes.qr_code"></qr-code>
                            </v-card-text>
                        </v-flex>
                    </v-card>
                </v-flex>
                <template v-else>
                    <v-container grid-list-md>
                        <v-layout row wrap justify-center align-center>
                        <v-flex  xs12 md9 >
                            <v-card class="rounded" elevation="10">
                                <v-card-text class="text-xs-center font-weight-bold"> 
                                    Anda Belum Memiliki Tiket <br> Silahkan Membeli Tiket dengan Menekan Tombol dibawah
                                    <v-spacer></v-spacer>
                                    <v-btn @click="openDialogOrderTicket" outline round color="info">
                                        Pesan TIket
                                    </v-btn>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                    </v-container>
                </template>
            </v-layout>
        </template>
    </v-container>
</template>
<script>
export default {
    data: () => ({
        loading:false,
        productTicket: [],
    }),
    methods: {
        fetchAllTicket(){
            const email = localStorage.getItem('Email')
           return axios.get(`/api/ticket/${email}`)
                  .then(ticket => this.productTicket = [ticket.data])
        },
        async getTicket(){
            this.loading = true
            try{
                const res = await this.fetchAllTicket()
            }catch(err){
                console.log(err)
            }
            this.loading = false
        },
        orderTicket(){

        }
    },
    mounted() {
        this.getTicket()
    },
}
</script>