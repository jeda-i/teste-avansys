<template>
  <tr>
      <td></td>
      <td>{{ operadora.operadora | properCase }}</td>
      <td>{{ operadora.descricao | properCase}}</td>
  </tr>
</template>
<script>
  export default {
    computed: {
      image() {
        return `/images/${this.color}.png`;
      }
    },
    methods: {
      update(val) {
        this.$emit('update', this.operadora.id, val.target.selectedOptions[0].value);
      },
      del() {
        this.$emit('delete', this.operadora.id);
      }
    },
    //props: ['id', 'color', 'name'],
    props: {
        operadora: Object
    },

    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<!-- <style>...</style> -->