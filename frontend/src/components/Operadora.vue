<template>
  <!-- Insersão de dados -->
  <!--
    <tr>
      <td><button>OK</button><button>X</button></td>
      <td>
          <select>
              <option value="">Todas</option>
                <option value="Cielo">Cielo</option>
                <option value="Mercado Pago">Mercado Pago</option>
                <option value="Moderninha">Moderninha</option>
          </select>
        </td>
      <td><input type="text"></td>
    </tr>
    -->
    

    <!--  Modo normal -->

    <tr>
        <td>
            <input type="checkbox">
            <button>edit</button>
            <input type="checkbox" name="status">
            <label for="status">Ativo</label>
        </td>
      <td>{{ operadora }}</td>
      <td>{{ descricao }}</td>
    </tr>




    <!--  Modo apenas leitura (para itens inativos)   -->
    <!--
    <tr>
        <td></td>
        <td>{{ operadora }}</td>
        <td>{{ descricao }}</td>
    </tr>
    -->
</template>

<script>
export default {
  
  props: {
    operadora: String,
    descricao: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    input[type=text]{
        width: 100%;;
    }


</style>
