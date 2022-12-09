<template lang="">

<!-- MENU "FILTER BY" POUR VERSION MOBILE -->
    <nav class="menu categories">
        <div class = "flex cursor-pointer items-center rounded-lg py-2 text-gray-400 hover:bg-blue-100 hover:text-gray-500 lg:hidden">
            <span class = "text-lg font-semibold text-slate-100">FILTER BY</span>
        </div>

            <div class="bg-downy rounded-xl">
                <details class = "group py-2 px-2 text-left font-bold mt-3 lg:hidden">
                    <summary
                        class = "flex cursor-pointer items-center rounded-lg px-4 py-2 text-black hover:bg-white hover:text-san-juan"
                        >
                        <span class = "text-sm font-medium">Categories</span>
                        
                        <span
                            class = "ml-auto shrink-0 transition duration-300 group-open:-rotate-180"
                            >
                            <svg
                                xmlns   = "http://www.w3.org/2000/svg"
                                class   = "h-5 w-5"
                                viewBox = "0 0 20 20"
                                fill    = "currentColor"
                                >
                                <path   
                                fill-rule = "evenodd"
                                d         = "M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule = "evenodd"
                                />
                            </svg>
                        </span>
                    </summary>

                    <ul class="">
                        <li class="">
                            <div class="flex items-center pl-3" v-for="(item, index) in items" :key="index">
            <input type="checkbox" :value="item.value" v-model="checkedValues" class="w-4 h-4 text-san-juan border-gray-400 rounded focus:ring-2 focus:ring-[#ef233c] dark:focus:cardinal"/>
            <label  class="py-2 ml-2 w-full text-sm md:text-base font-medium text-eagle-green">
            {{ item.label }}
            </label>
                </div>
                        </li>
                    </ul>
                </details>
            </div>
    </nav>

    

    <nav class="menu commentaires">
        <div class="bg-downy rounded-xl">
            <details class = "group py-2 px-2 text-left font-bold mt-3 mb-3 lg:hidden">
                <summary
                    class = "flex cursor-pointer items-center rounded-lg px-4 py-2 text-black hover:bg-white hover:text-san-juan"
                    >
                    <span class = "text-sm font-medium">Stars</span>
                    
                    <span
                        class = "ml-auto shrink-0 transition duration-300 group-open:-rotate-180"
                        >
                        <svg
                            xmlns   = "http://www.w3.org/2000/svg"
                            class   = "h-5 w-5"
                            viewBox = "0 0 20 20"
                            fill    = "currentColor"
                            >
                            <path   
                            fill-rule = "evenodd"
                            d         = "M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule = "evenodd"
                            />
                        </svg>
                    </span>
                </summary>

                <ul class="">
                    <li class="w-full">
                        <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 10+" value="1" v-model="picked" />
    <label for="10"> 1+</label></li>

    <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 20+" value="2" v-model="picked" />
    <label for="20"> 2+</label></li>

    <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 30+" value="3" v-model="picked" />
    <label for="30"> 3+</label></li>

    <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 30+" value="4" v-model="picked" />
    <label for="30"> 4+</label></li>
                    </li>
                </ul>
<!-- Apply Filter Button -->
<div class="bg-downy rounded-b-xl">
    <div class="py-5 px-4">	
        <button @click="applyFilters()" class="hover:bg-san-juan focus:ring focus:ring-offset-2 focus:ring-cardinal text-base leading-4 font-medium py-4 px-10 text-white bg-san-juan">Apply Filter</button>
    </div>
</div>

            </details>

            
        </div>

        

    </nav>


<!-- MENU "FILTERS" POUR VERSION DESKTOP -->
<!-- {{-- https://tailwinduikit.com/components/E-commerce/Components/filters --}} -->

<div class="hidden lg:grid grid-flow-row gap-3 w-full bg-cardinal rounded-xl">

<!-- Categories Section -->
<div class="bg-downy w-full rounded-t-xl">
    <div class="flex space-x-2 text-eagle-green items-center">
        <img class="object-cover h-8 w-8 ml-2 mt-2" src="https://img.icons8.com/ios-filled/50/null/categorize.png" alt="categories"/>
        <p class="lg:text-xl text-lg lg:leading-6 leading-5 font-semibold">Catégories</p>
    </div>
    
    <ul class="">
        <li class="">
            <div class="flex items-center pl-3" v-for="(item, index) in items" :key="index">
            <input type="checkbox" :value="item.value" v-model="checkedValues" class="w-4 h-4 text-san-juan border-gray-400 rounded focus:ring-2 focus:ring-[#ef233c] dark:focus:cardinal"/>
            <label  class="py-2 ml-2 w-full text-sm md:text-base font-medium text-eagle-green">
            {{ item.label }}
            </label>
            </div>
        </li>
    </ul>
</div>

<!-- Nombre de Stars Section -->
<div class=" bg-downy w-full">
    <div class="flex space-x-2 text-eagle-green items-center">
        <img class="object-cover h-8 w-8 ml-2 mt-2" src="https://img.icons8.com/windows/32/null/star--v1.png" alt="like"/>
        <p class="lg:text-xl text-lg lg:leading-6 leading-5 font-semibold">Stars</p>
    </div>
    
    <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 10+" value="1" v-model="picked" />
    <label for="10"> 1+</label></li>

    <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 20+" value="2" v-model="picked" />
    <label for="20"> 2+</label></li>

    <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 30+" value="3" v-model="picked" />
    <label for="30"> 3+</label></li>

    <li class="list-none ml-3"><input name="likesection" class="my-2" type="radio" id=" 30+" value="4" v-model="picked" />
    <label for="30"> 4+</label></li>

</div>

<!-- Apply Filter Button -->
<div class="bg-downy rounded-b-xl">
    <div class="py-5 px-4">	
        <button @click="applyFilters()" class="hover:bg-san-juan focus:ring focus:ring-offset-2 focus:ring-cardinal text-base leading-4 font-medium py-4 px-10 text-white bg-san-juan">Apply Filter</button>
    </div>
</div>

<!-- // FIN Filtre des catégories -->
</div>


</template>


<script>


export default {
    emits:['newposts'],
    data() {
        return {
            picked:'',
            starselec:'',
            items:[],
            newposts:null,
            categories: Array,
            checkedValues:[],
        }
  },
  methods : {

//    getCat(){
//     console.log('Vous êtes ici');
//     var myHeaders = new Headers();
//     myHeaders.append("Cookie", "XSRF-TOKEN=eyJpdiI6IlNXUWZTSEJUbmtHaWdBS2sxbzcrbVE9PSIsInZhbHVlIjoiUm16RmFIMkl3R2xFTVdmRkhUT1Z4UGdZYmQyeUJyY1gzMVo1emNkZjZUUkFHRFY5bEpzUERUZnJEbk5aejl5VmVoOXo2bDdtNTF2dVk2c2wzOVVMc2diN2ZsemVPdklyd05QTVVxVE1uZzMrLy9rRmpzYlRrL3FSRW4xODYvemgiLCJtYWMiOiIwODc1YzcyYmM4MDBkNzYyMTg4NWQ1Njk3MDdjNWM1NWJkNzYxZjMzZjY2YzNlNDI4MDYyNjExYjA4MDVhOGY3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Ill4bGNCbXVaaGZ2cHJuKzFGM0pvOUE9PSIsInZhbHVlIjoia01MTW9yQVp6QkU1eGtjU1l6ZVlSUWp3VE0vWkhOVkNlMDdkcUV5aGxxRS9LaXhDWEVEYjVYem1JU3NKS2NSK3RTRHMyZWlCVXVqZ1Fwcm8yRGhIcXNjUVBXTWdEZGZlT2lkeTJUVGNxdzJUanRJMkVUb0ZJTEhxWEM0VjEzcXoiLCJtYWMiOiIzNDJjMDljMDc1ZWU4NmQyNTRjYjc1MWNkZTk5NzQ5MThhODdhMjc2NWZkYzE0MGNhMjliZmI5NzRjNTU5MDQyIiwidGFnIjoiIn0%3D");

//     var requestOptions = {
//     method: 'GET',
//     headers: myHeaders,
//     redirect: 'follow'
//     };

// fetch("http://127.0.0.1:8000/api/categories", requestOptions)
//   .then(response => response.json())
//   .then(result => {
//     console.log(result);
//     this.items=result
//     ;})
//   .catch(error => console.log('error', error));
//     },

//     submitForm() {
//     console.log(this.categories);
//   },

getcategories(){

var myHeaders = new Headers();
  myHeaders.append("Accept", "application/json");
  var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow'
  };

  fetch(this.$path + "api/categories", requestOptions)
    .then(response => response.json())
    .then(result => {
      for (const key in result) {
        // console.log(key + ": " + result[key].name + result[key].id);
        const obj = new Object();
        obj.label =result[key].name ;
        obj.value = result[key].id;
        this.items.push(obj);
     }
    })
    .catch(error => console.log('error', error));
},

applyFilters() {
    
    if (this.checkedValues==[]){
        this.checkedValues=[0];
    }
    else{
        // let pars = this.checkedValues.map((str)=>{
        //     return parseArgs(str);
        // })
        
        // const data = {checkedValues: pars} 

        // console.log(data);
        } 
    
    
    this.starselec=this.picked;
    if (this.picked==''){
        this.starselec=0;
    } ;


//     var myHeaders = new Headers();
//     myHeaders.append("Content-Type", "text/plain");

//     var raw = this.checkedValues + ","+this.starselec;

//     var requestOptions = {
//     method: 'POST',
//     headers: myHeaders,
//     body: raw,
//     redirect: 'follow'
//     };

// fetch("http://127.0.0.1:8000/api/fposts", requestOptions)
//   .then(response => response.json())
//   .then(result => console.log(result))
//   .catch(error => console.log('error', error));

// // AU secours : tentative avec donnée RAW 

    var urlencoded = new URLSearchParams();



    var requestOptions = {
    method: 'POST',
    body: urlencoded,
    redirect: 'follow'
};


    fetch(this.$path + "api/fposts?categories="+this.checkedValues+"+&starselec="+this.starselec, requestOptions)
    .then(response => response.json())
    .then(result => {
        // console.log(this.checkedValues);
        this.newposts= result;})
        .then(result => 
        {this.$emit('newposts', this.newposts);
        })
    .catch(error => console.log('error', error));

    this.checkedValues=[];
    }

},

    beforeMount(){
        this.getcategories();
    },

    // beforeupdate(){
    //     this.getCat();
    // }
}   
</script>
