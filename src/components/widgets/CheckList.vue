<template>
    <div class="CheckList">
        <label class="selectorWrapper">
            <input @click="toggle = !toggle" type="checkbox">
            <div class="box">
                <b>{{boxTitle}}</b>
                <i class="fas fa-caret-down"></i>
            </div>
        </label>
        <ul v-if="toggle" class="list">
            <li v-for="(item,index) in list" :key="index">
                <label class="checkboxContainer">           
                    <input :id="item" :value="item" v-model="checkedItems"  type="checkbox" @change="clicked">
                    <b>{{item}}</b>
                    <span class="checkmark"><i class="fas fa-check"></i></span>
                </label>               
            </li>    
        </ul>
        <br>
    </div>
</template>

<script>
export default {
    props: ['boxTitle', 'list'],
    data: function(){
        return{
            checkedItems: [],
            toggle: false
        }
    },
    methods:{
        clicked: function(item){     
            this.$emit('checked', this.checkedItems)
        }
    }
    
}
</script>

<style lang="scss" scoped>

    $font-type: 'Source Sans Pro', sans-serif;
    $white: #fffeff;
    $light-grey:#EFF4F7;
    $grey: #c5c4c5;
    $blue-grey: #213648;
    $orange: #f06000;

    .CheckList{

        b{
            font-family: $font-type;
            color: $blue-grey;
            font-size: .8875em;
        }

        .selectorWrapper{
            input{
                position: absolute;
                opacity: 0;
            }

            ul{
                display: none;
            }
        }

        .box{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 4px;
            border-bottom: 2px solid $grey;
            transition: .15s;

            i{
                font-size: .8875em;
                transition: .15s;
            }
        }

        .selectorWrapper input:checked ~ .box{
            border-bottom: 2px solid $orange;
        }

        .selectorWrapper input:checked ~ .box i{
            transform: rotate(-180deg);
        }

        .selectorWrapper input:checked ~ ul{
            display: block;
        }

        .list{
            max-height: 195px;
            overflow-y: scroll;
            list-style: none;
            padding-left: 10px;

            .checkboxContainer{
       
                display: flex;
                align-items: center;

                position: relative;
                cursor: pointer;
                padding-left: 27px;
                margin-bottom: 8px;
                user-select: none;

                b{
                    font-family: $font-type;
                    font-size: .87em;
                    color: #9a9a9a;
                }

                input{
                    position: absolute;
                    opacity: 0;
                    cursor: pointer;
                    height: 0;
                    width: 0;
                }

                .checkmark {
                    position: absolute;
                    left: 0;
                    height: 14px;
                    width: 14px;
                    border-radius: 2px;
                    border: 1px solid #9a9a9a;

                    i{
                        position: relative;
                        bottom: 3px;
                        left: 2px;
                        font-size: 10px;
                        color:white;
                    }
                }

            }

            .checkboxContainer input:checked ~ b {
                color: $blue-grey;
            }
            

            .checkboxContainer:hover input ~ .checkmark {
                border-radius: 2px;
                border: 1px solid #656565;
            }

            .checkboxContainer:hover b {
                color: #656565;
            }

            .checkboxContainer input:checked ~ .checkmark {
                background-color: $orange;
                border: 1px solid $orange;
            }

            li{
                padding: 4px 0;
            }
        }

        .box:hover{
            border-bottom: 2px solid #798690;
            cursor: pointer;
        }

    }
</style>
