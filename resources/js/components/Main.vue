<template>
    <div class="post">
        <div class="row justify-content-center">
            <div class="post-image">
                post image 1
            </div>
            <div class="product-images">
                <div class="product-image" @click="showItemDetail('ProductImage1')">ProductImage1</div>
                <div class="product-image" @click="showItemDetail('ProductImage2')">ProductImage2</div>
                <div class="product-image" @click="showItemDetail('ProductImage3')">ProductImage3</div>
            </div>
        </div>
    </div>
    <div class="popup" v-if="isItemDetailShown">
        <ItemDetails v-if="isItemDetailShown" :productImage="currentPopupImage" @close="closePopup" />
    </div>

</template>

<script lang="ts">
import { ref } from 'vue'
import ItemDetails from './ItemDetails.vue'

export default {
    name: 'Main',
    components: {
        'ItemDetails': ItemDetails,
    },
    data() {
        let isItemDetailShown = ref(false)
        let currentPopupImage = ref('')

        return {
            isItemDetailShown,
            currentPopupImage,
        }
    },
    methods: {
        closePopup() {
            this.isItemDetailShown = false
        },
        showItemDetail(imageName: string): void {
            this.isItemDetailShown = true
            this.currentPopupImage = imageName
        },
    },
}
</script>
<style scoped>
.post {
    width: 40%;
    margin-left: 30%;
    margin-right: 30%;
}

.post-image {
    border: black solid 1px;
    text-align: center;
    width: 100%;
    height: 500px;
    padding: 250px 0;
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
    height: 200px;
    padding: 100px 0;
    text-align: center;
    color: white;
    background-color: rgb(80, 130, 245);
}

.popup {
    opacity: 1;
    width: 38%;
    margin-left: 31%;
    margin-right: 31%;
    margin-top: 20vh;
    height: 50vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1%;
}
</style>
