<template>
  <v-container grid-list-lg>
    <v-layout row wrap v-if="loading">
      <v-flex>
        <v-progress-circular :size="70" :width="7" indeterminate color="primary"></v-progress-circular>
      </v-flex>
    </v-layout>
    <template v-else>
      <v-layout row wrap align-center justify-space-arround>
        <v-flex>
          <h1>Daftar User</h1>
        </v-flex>
        <v-spacer></v-spacer>
        <v-btn color="success" @click="openDialogAddUser">
          <v-icon>fa fa-plus</v-icon>
          <v-spacer></v-spacer>Registrasi User
        </v-btn>
      </v-layout>
    </template>
    <v-data-table
      :headers="headers"
      :items="items"
      disable-initial-sort
      :loading="loading"
      rows-per-page-text="Baris per halaman"
    >
      <template v-slot:items="props">
        <td>{{props.item.id}}</td>
        <td>{{props.item.name}}</td>
        <td>{{props.item.email}}</td>
        <td>
          <p v-if="props.item.role == 1">Superadmin</p>
          <p v-else-if="props.item.role == 2">Admin</p>
          <p v-else-if="props.item.role == 3">Scanner</p>
          <p v-else>Customer</p>
        </td>
        <td>
          <v-btn flat icon>
            <v-icon color="error" >fa fa-trash</v-icon>
          </v-btn>
        </td>
      </template>
    </v-data-table>
    <v-dialog v-model="dialogCreateUser" max-width="600" persistent>
      <dialog-create-user 
      @close="closeUser" 
      @create_success="reloadUser" 
      :key="dialogCreateUserkey"
      ></dialog-create-user>
    </v-dialog>
  </v-container>
</template>
<script>
import DialogCreateUser from "../Dialog/DialogCreateUser";
export default {
  components: {
    DialogCreateUser
  },
  data: () => ({
    loading: false,
    items: [],
    headers: [
      { text: "ID", value: "id" },
      { text: "Name", value: "name" },
      { text: "E-Mail", value: "email" },
      { text: "Hak Akses", value: "role" },
      { text: "Aksi", value: "action" }
    ],
    dialogCreateUserkey: 0,
    dialogCreateUser: false
  }),
  methods: {
    fetchAllUser() {
      return axios.get("/api/user");
    },
    async getAllUser() {
      this.loading = true;
      try {
        const res = await this.fetchAllUser();
        this.items = res.data.map(item => ({
          id: item.id,
          name: item.name,
          email: item.email,
          role: item.role_id
        }));
      } catch (err) {
        console.log(err);
      }
      this.loading = false;
    },
    openDialogAddUser() {
      this.dialogCreateUserkey = !!this.dialogCreateUserkey ? 1 : 0;
      this.dialogCreateUser = true;
    },
    closeUser() {
      this.dialogCreateUser = false;
      this.UserId = 0
    },
    reloadUser(){
      this.closeUser();
      this.getAllUser();
    }
  },
  mounted() {
    this.getAllUser();
  }
};
</script>