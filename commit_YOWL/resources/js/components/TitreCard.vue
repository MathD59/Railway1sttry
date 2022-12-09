<template lang="">
    <div>
        <div class="grid justify-items-center 2xl:mx-auto lg:py-5 lg:px-10 md:py-12 md:px-6">
            <div class="text-center text-gray-600">
                <h1 class="text-2xl lg:text-3xl font-bold leading-9 text-slate-100 mb-4">{{titre}}</h1>
            </div>
        </div>
    </div>
</template>


<script>

export default {
    props:['titre'],    
}

</script>
