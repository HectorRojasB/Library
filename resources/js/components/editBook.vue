<template>
    <div>
        <v-card>
            <v-card-title>
                <h4>Edit book</h4>
            </v-card-title>
            <v-card-text>
                <v-form ref="form" v-model="valid">
                    <v-row no-gutters>
                        <v-col>
                            <v-text-field v-model="name" label="Name" :rules="rules.name"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row no-gutters>
                        <v-col>
                            <v-text-field v-model="author" label="Author" :rules="rules.author"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col class="py-0">
                            <!-- <v-text-field v-model="published_date" label="Published date" :rules="rules.published_date"></v-text-field> -->
                            <v-menu v-model="datepicker" :close-on-content-click="false" :nudge-right="40" transition="scale-transition" offset-y min-width="290px">
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field v-model="published_date" label="Published date" readonly v-bind="attrs" v-on="on"></v-text-field>
                                </template>
                                <v-date-picker v-model="published_date" @input="datepicker = false"></v-date-picker>
                            </v-menu>
                        </v-col>
                        <v-col class="py-0">
                            <v-autocomplete :items="categories" item-value="id" v-model="category" label="Category" :rules="rules.category"></v-autocomplete>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions class="justify-end">
                <v-btn @click="closeModal()" text>Close</v-btn>
                <v-btn color="primary" @click="update()">Save</v-btn>
            </v-card-actions>
        </v-card>
    </div>
        
</template>

<script>
    
export default {
    data(){
        return{
            valid: false,
            datepicker: false,
            data:[],
            categories:[],
            name:'',
            author:'',
            published_date:'',
            category:'',
            rules: {
                name: [
                    v => !!v || 'Name is required'
                ],
                author: [
                    v => !!v || 'Author required'
                ],
                published_date: [
                    v => !!v || 'Publish date is required'
                ],
                category: [
                    v => !!v || 'Category is required'
                ]
            },
            myOptions: []
        }
    },
    props: ['id'],
    methods:{
        getBook(){
            axios.get('/books/'+this.id)
            .then(response => {
                this.name  = response.data.name;
                this.author  = response.data.author;
                this.published_date  = response.data.published_date;
                this.category  = response.data.category_id;
            })
        },
        getCategories(){
            axios.get('/categories')
            .then(response => {
                this.categories = response.data;
            })
        },
        update(){
            if(this.$refs.form.validate()){
                axios.patch('/books/'+this.id, {
                    name: this.name,
                    author: this.author,
                    published_date: this.date,
                    category_id: this.category,
                })
                .then((response) => {
                    this.closeModal()
                })
            }
        },
        closeModal(){
            this.$emit('closeModal')
        },
    },
    created(){
        this.getBook();
        this.getCategories();
    },
    watch: {
        id(val){
            this.getBook()
        }
    }
}
</script>