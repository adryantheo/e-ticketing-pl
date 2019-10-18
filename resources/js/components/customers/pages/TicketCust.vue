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
        <template v-for="(item, i) in productTicket"> 
            <v-layout :key="`am-${i}`">
                <v-flex v-if="!!product.length > 0" style="max-height:100px">
                    <v-card>
                        <v-flex>
                            <v-card-text>
                                <qr-code :text="item.qr_codes.qr_code"></qr-code>
                                <h1>aaaaa</h1>
                            </v-card-text>
                        </v-flex>
                    </v-card>
                </v-flex>
                <v-flex v-else xs12 md9 >
                    <v-card class="rounded" elevation="10">
                        <v-card-text class="text-xs-center font-weight-bold"> 
                            Anda Belum Memiliki Tiket <br> Silahkan Membeli Tiket dengan Menekan Tombol dibawah
                            <v-spacer></v-spacer>
                            <v-btn outline round color="info">
                                Pesan TIket
                            </v-btn>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
        </template>
    </v-container>
</template>
<script>
import { isBoolean } from 'util'
export default {
    data: () => ({
        loading:false,
        productTicket: [],
        product: ""
    }),
    methods: {
        fetchAllTicket(){
            const email = localStorage.getItem('Email')
            return axios.get(`/api/ticket/${email}`)            
        },
        async getTicket(){
            this.loading = true
            try{
                const res = await this.fetchAllTicket()
                this.productTicket = res.data
                this.product = this.productTicket
                console.log(this.product)
            }catch(err){
                console.log(err)
            }
            this.loading = false
        },
    },
    mounted() {
        this.getTicket()
    },
}
</script>