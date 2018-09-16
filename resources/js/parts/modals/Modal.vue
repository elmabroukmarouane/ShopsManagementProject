<template>
    <!-- Begin Modal Logout -->
    <div class="modal fade" :id="id">
        <div class="modal-dialog">
            <div class="modal-content animated zoomInUp">
                <slot name="header_modal"></slot>
                <slot name="body_modal"></slot>
            </div>
        </div>
    </div>
    <!-- End Modal Logout -->
</template>
<script>
export default {
  props: ["id"]
};
</script>
