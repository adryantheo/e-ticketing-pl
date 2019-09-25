<template>
    <v-card>
        <v-toolbar>
            <v-toolbar-title>Tambah Scanner</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat icon>
                <v-icon>fa fa-times</v-icon>
            </v-btn>
        </v-toolbar>
        <v-card-text>
            <v-form>
                <v-text-field
                label="username"
                v-model="name"
                ></v-text-field>
                <v-text-field
                label="password"
                v-model="password
                "
                ></v-text-field>
            </v-form>
        </v-card-text>
    </v-card>
</template>