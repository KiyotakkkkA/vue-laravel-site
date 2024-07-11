<template>
    <div class="modal-window" v-if="showModal && item.id == focusOn">
        <transition name="modal-fade">
            <div v-if="showModal" class="modal">
                <div class="modal-content">
                    <h2>{{ item.name }}</h2>
                    <p>Цена: {{ item.price }}</p>
                    <div class="nutrition-info">
                        <p>Белки: {{ item.protein }}</p>
                        <p>Жиры: {{ item.fat }}</p>
                        <p>Углеводы: {{ item.carbs }}</p>
                        <p>Калории: {{ item.calories }}</p>
                    </div>
                    <slot />
                </div>
            </div>
        </transition>
        <div class="dark-overlay"></div>
    </div>
</template>

<script setup>
defineProps({
    showModal: Boolean,
    focusOn: Number,
    item: Object,
});
</script>

<style scoped>
.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.dark-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity 0.5s;
}
.modal-fade-enter,
.modal-fade-leave-to {
    opacity: 0;
}
</style>
