<template>
    <div class="card card-primary" :id="id">
        <slot name="shop_image"></slot>
        <div class="card-body text-center">
            <slot name="shop_name"></slot>
            <hr>
            <slot name="shop_footer"></slot>
        </div>
    </div>
</template>
<script>
export default {
  props: ["id"]
};
</script>
