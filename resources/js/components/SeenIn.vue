<template>
    <div class="window">
        <div class="window-header">
            <button @click="back(seenInImage)">&#60;</button>
            <div class="window-title">
                Seen-In
            </div>
            <button class="close-button" @click="close">
                &nbsp;X&nbsp;
            </button>
        </div>
        <div class="post-image">
            post image 2
        </div>
        <div class="product-images">
            <div class="product-image" @click="back('ProductImage1')">ProductImage1</div>
            <div class="product-image" @click="back('ProductImage4')">ProductImage4</div>
            <div class="product-image" @click="back('ProductImage5')">ProductImage5</div>
        </div>
    </div>
</template>

<script lang="ts">
export default {
    name: 'ItemDetails',
    emits: ["close", "back"],
    props: { seenInImage: String },
    methods: {
        close() {
            this.$emit("close")
        },
        back(qq: string) {
            this.$emit("back", qq)
        }
    },
}
</script>

<style scoped>
.window {
    display: flex;
    flex-direction: column;
    background-color: white;
    width: 100%;
    height: 100%;
    padding: 5px 10px;
}

.window-header {
    display: flex;
    width: 100%;
    justify-content: space-between;
}

.window-title {
    text-align: center;
}

.close-button {
    text-align: right;
}

.previous-button {
    text-align: left;
}

.post-image {
    border: black solid 1px;
    text-align: center;
    width: 100%;
    height: 0px;
    padding: 130px 0;
    color: white;
    background-color: rgb(80, 130, 245);
}

.product-images {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: right;
    margin-top: 3px;
    gap: 3px;
}

.product-image {
    flex: 1;
    border: black solid 1px;
    display: inline-block;
    width: 33%;
    height: 0px;
    padding: 60px 0;
    text-align: center;
    color: white;
    background-color: rgb(80, 130, 245);
}

.seen-in-button {
    color: white;
    border: black solid 1px;
    background-color: green;
}
</style>
