<template>
  <v-app>
    <v-content>
      <v-container grid-list-lg fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 md9 style="max-width: 600px">
            <v-card>
              <v-toolbar >
                <v-toolbar-title>Registrasi</v-toolbar-title>
              </v-toolbar>
              <v-card-text>
                <v-form ref="form_register_user" @submit.prevent="registerUser">
                  <v-text-field label="username" v-model="name" :rules="[rules.required,]"></v-text-field>
                  <v-text-field label="email" v-model="email" :rules="[ rules.email]"></v-text-field>
                  <v-text-field
                    label="password"
                    v-model="password"
                    type="password"
                    :rules="[rules.required, rules.password1, rules.password]"
                  ></v-text-field>
                  <v-text-field
                    label="konfirmasi password"
                    type="password"
                    v-model="c_password"
                    :rules="[rules.required, rules.password1]"
                  ></v-text-field>
                  <v-card-actions>
                     <router-link :to="{path: '/login'}">Sudah Punya Akun? Login Disini</router-link>
                     <v-spacer></v-spacer>
                     <v-btn 
                     color="error"
                     outline round 
                     :to="{path: '/'}">
                        cancel
                     </v-btn>
                     <v-btn 
                     :loading="loading"
                     color="success"
                     outline round 
                     flat type="submit"
                     >register
                     </v-btn>
                  </v-card-actions>
                </v-form>
              </v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>
<script>
export default {
  data: () => ({
    name: null,
    email: null,
    password: null,
    c_password: null,
    role: 0,
    rules: {
      email: v => (v || "").match(/@/) || "Format Email Salah",
      required: v => !!v || "Harus diisi",
      password1: v => String(v).length >= 6 || 'Password minimal 6 karakter',
      password: v => String(v).match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) ||"Password harus terdiri dari alphabert, angka,huruf kapital, dan karakter spesial"
    },
    loading: false
  }),
  methods: {
    async registerUser() {
    if (this.$refs.form_register_user.validate()) {
      this.loading = true
      try {
        const request = {
          name: this.name,
          email: this.email,
          password: this.password,
          c_password: this.c_password,
          role_id: this.role
        };
        const res = await this.$user.signup(request);
        this.$router.replace({path: '/login'})
      } catch (err) {
        console.log(err);
      }
    }
  } 
  },
};
</script>