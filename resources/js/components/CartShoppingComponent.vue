<template>
    <div class="cart-shopping" v-on:click="handleFetch">
        <div class="icon">
            <i class="bi bi-bag-plus-fill"></i>
        </div>
        <div class="quantity" v-if="quantity" v-text="quantity"></div>
    </div>
</template>

<script>
export default {
    props: ['quantity'],
    data()
    {
        return {
            url: '/carrinho/pedidos'
        }
    },
    methods: {
        handleFetch()
        {
            fetch(this.url)
                .then(() => {
                    window.location.href = this.url;
                })
        }
    }
}
</script>

<style>
    .cart-shopping
    {
        position: relative;

        display: flex;
        align-items: center;

        cursor: pointer;

        width: 3rem;
    }
    .cart-shopping .icon
    {
        font-size: 2em;
    }
    .cart-shopping .quantity
    {
        position: absolute;
        top: 0;
        right: 0;
    }
    .quantity
    {
        clip-path: circle(50%);
        
        background-color: red;
        color: white;
        
        text-align: center;
        font-weight: bold;
        
        width: 1.5rem;
    }
</style>
