<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-menu">
                        <div class="menu-title">
                            <h3>Search</h3>
                        </div>

                        <div class="menu-content">
                            <input v-model="search" placeholder="Search Posts">
                            <div v-if="this.search.toLowerCase() == 'starwars'">
                                <img src="http://devwiki.devx.realpage.com/wp-content/uploads/2019/03/giphy.gif" alt="">
                            </div>
                            <div v-if="this.search.toLowerCase() == 'i hate snakes'">
                                <img src="http://devwiki.devx.realpage.com/wp-content/uploads/2019/04/giphy.gif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="search-results">

                        <header>
                            <h1>Search Results</h1>
                        </header>

                        <hr>

                        <table>
                            <tr>
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Post Date</th>
                            </tr>

                            <tr v-if="search" v-for="(item,index) in filteredAssets" :key=index>
                                <td><a :href="item.url" Target="_blank"><span v-html="$options.filters.highlight(item.title,search)"></span></a></td>
                                <td>{{item.excerpt}}</td>
                                <td>{{item.date}}</td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapMutations} from 'vuex';
import CheckList from '../Widgets/CheckList.vue';
const axios = require('axios');


export default {
    
    data: function (){
        return{
            search: '',
            searchResults: []

        }
    },
    components:{
        'CheckList': CheckList
    },
    methods:{
        // test: function(){
        //     console.log("yoo")
        // },
        ...mapMutations({
            changeNavState: 'changeNavState'
        }),
        filterCat: function(data){
            this.catFilter = data;
        },
        filterPostType: function(data){
            this.postTypeFilter = data;
        },
        getAssets: function(){
            axios.get(`http://devwiki.devx.realpage.com/wp-json/myroutes/get-all-posts`)
                .then( response => {
                    this.searchResults = response.data
                    this.test = response.data
                })
                .catch( error => {
                    console.log(error);
                })
        }
    },
    computed:{
        filteredAssets: function(){

            let data = this.searchResults;

            if(this.search){
                data = data.filter( item => {
                    return item.excerpt.toLowerCase().match(this.search.toLowerCase());
                });
            }

            return data;
            
        }
    },
    filters: {
        capitalize: function (value) {
            if (!value) return ''
            value = value.toString()
            return value.charAt(0).toUpperCase() + value.slice(1)
        },
        highlight: function(value, query){

            let re = new RegExp(query, 'i');
            let changeValue;

            if(value.match(re)){

                changeValue = value.match(re)[0]
                return value.replace(changeValue, "<b>" + changeValue +"</b>")

            }
            else{
                return value
            }

            return value;

        }
    },
    mounted: function(){
        
    },
    beforeRouteEnter (to, from, next) {
        next(vm => {
           vm.getAssets();
        })
    }
}
</script>

<style lang="scss" scoped>

    $white: #fffeff;
    $grey: #c5c4c5;
    $blue-grey: #213648;
    $orange: #f06000;

    $font-type: 'Source Sans Pro', sans-serif;

    .highlight {
        background: yellow;
    }

    .search-menu{
        background: #fffeff;

        .menu-title{
            > h3{
                margin: 50px 0 20px;
                font-weight: 400;
                font-family: $font-type;
            }
        }

        .menu-content{
            //margin: 0 25px 0 25px;

            input{
                max-width:400px;
                padding: 7.5px;
                outline: none;
                font-size: .75em;
                box-sizing: border-box;
                width: 100%;
                margin-bottom: 35px;
            }

            .content-filter{
                h4{
                    font-family: $font-type;
                    color: $blue-grey;
                    font-weight: 400;
                    font-size: 1em;
                    margin: 0;
                    margin-bottom: 12px;
                }
            }
        }
    }

    .search-results{
        margin-left: 0px;

        header{
            padding-top: 38px;
            padding-bottom: 27.5px;
        }
        h1{
            font-family: $font-type;
            font-weight: 300;
            font-size: 2rem;
            color: $blue-grey;
            margin: 0;
        }
        table{
            margin: 30px 0 45px;
            width: 100%;
            text-align: left;
            background: $white;
            border-radius: 2.5px;
            border-spacing: 0;
            box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.1);
        }

        th,td{
            padding: 18.5px;
            font-family: $font-type;
        }

        tr a{
            text-decoration: none;
            color: $blue-grey;
        }

        th{
            font-weight: 600;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
        }
        
        th:nth-of-type(1){
            width: 20%;
        }

        th:nth-of-type(2){
            width: 60.0%;
        }

        th:nth-of-type(3){
            width: 20.0%;
        }

        td{
          border-bottom: 1px solid rgba(0, 0, 0, 0.1);  
        }

        tr:nth-of-type(even){
            background: rgba(0, 0, 0, 0.025);
        }
        
    }

    @media all and (max-width:767px){
        th:nth-of-type(2){
            width: 50.0%;
        }

        th:nth-of-type(3){
            width: 30.0%;
        }
    }

</style>
