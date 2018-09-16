<template>
    <table :id="id" class="table table-bordered text-center">
        <thead>
            <tr>
                <th v-for="(field, index) in list_datatable_fields" v-if="list_datatable_fields.length > 0" :key="index">{{ field }}</th>
            </tr>
        </thead>
        <tbody><slot name="tbody_tr_table"></slot></tbody>
    </table>
</template>
<script>
export default {
  props: ["id", "list_datatable_fields"]
};
</script>
