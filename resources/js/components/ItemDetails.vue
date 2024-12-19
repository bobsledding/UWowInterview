<template>
    <div class="window" v-if="!isSeenInShown">
        <div class=" window-header">
            <div>&nbsp;&nbsp;&nbsp;</div>
            <div class="window-title">
                Item details
            </div>
            <button class="close-button" @click="close">
                &nbsp;X&nbsp;
            </button>
        </div>
        <div class="product-image-block">
            <div class="product-image">{{ seenInImage }}</div>
            <div class="seen-in-button" @click="showSeenIn">Seen In</div>
        </div>
        <p>Some text description</p>
        <p>Some text description</p>
        <p>Some text description</p>
    </div>
    <SeenIn v-if="isSeenInShown" :seenInImage="seenInImage" @close="close" @back="backFromSeenIn" />
</template>

<script lang="ts">
import { ref } from 'vue'
import SeenIn from './SeenIn.vue'

export default {
    name: 'ItemDetails',
    components: {
        'SeenIn': SeenIn,
    },
    emits: ["close"],
    props: { productImage: String },
    data() {
        let isSeenInShown = ref(false)
        let seenInImage = ref(this.productImage)

        return {
            isSeenInShown,
            seenInImage,
        }
    },
    methods: {
        close() {
            this.isSeenInShown = false
            this.$emit("close")
        },
        backFromSeenIn(seenInImage) {
            this.isSeenInShown = false
            this.seenInImage = seenInImage
        },
        showSeenIn(imageName: string): void {
            this.isSeenInShown = true
            this.currentPopupImage = imageName
        },
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

.product-image-block {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    border: black solid 1px;
    text-align: center;
    color: white;
    background-color: rgb(80, 130, 245);
}

.product-image {
    width: 100%;
    padding: 100px;
    text-align: center;
}

.seen-in-button {
    color: white;
    border: black solid 1px;
    background-color: green;
}
</style>
