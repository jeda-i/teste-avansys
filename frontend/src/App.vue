<template>
    <div id="app">
        <div class="container">
            <header>
                <h1>Manter operadora</h1>
            </header>
            <div class="body">
                <div class="row">
                    <div class="select is-small">
                        <label for="operadora">Listar Operadora</label>
                        <select name="operadora">
                            <option value="">Todas</option>
                            <option value="Cielo">Cielo</option>
                            <option value="Mercado Pago">Mercado Pago</option>
                            <option value="Moderninha">Moderninha</option>
                        </select>
                    </div>
                    <div class="select is-small">
                        <label for="status">Status</label>
                        <select name="status">
                            <option value="">Todos</option>
                            <option value="Ativos">Ativos</option>
                            <option value="Inativos">Inativos</option>
                        </select>
                    </div>
                </div>
				<div class="row">
					<button>Novo</button>
				</div>
				<div class="row">
					<input type="checkbox" name="marcarTodos">
					<label for="marcarTodos">Marcar todos</label>
					<button>Excluir</button>
					<button>Habilitar e desabilitar</button>
				</div>
				<div class="table">
					<table>
						<thead>
							<th></th>
							<th>Operadora</th>
							<th>Descri&ccedil;&atilde;o</th>
						</thead>
						<tbody>
                            <operadora operadora="Cielo" descricao="Teste"></operadora>
                            <operadora operadora="Redecard" descricao="ok"></operadora>
                            <operadora operadora="MasterCard" descricao="123"></operadora>
                            <operadora operadora="Cielo" descricao="kiasdoaikso"></operadora>
						</tbody>
					</table>
				</div>
            </div>            
        </div>
    </div>
</template>

<script>
//import HelloWorld from './components/HelloWorld.vue'
import Operadora from './components/Operadora.vue'
import axios from 'axios'

export default {
  name: 'App',
  components: {
    Operadora
  },
  created: () => {
      axios.get("localhost:8000/api/operadoras").then(res => {
          console.log(res);
      })
  }
}
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background-color: #E5E5E5;
}

header{
    border-bottom: 1px solid black;
    margin-bottom: 1cm;
}
.container{
    padding: 5% 10% 5% 10% ;
}

[type=checkbox], button{
    margin-left: 5px;
    margin-right: 5px;
}

.row{
    height: 50px;
    margin: 5px;
}

table{
    width: 100%;
}

tr:nth-child(odd) {
	background-color:#E9EDF4;
}
	
tr:nth-child(even) {
	background-color:#F7F7F8;
}

.body{
    background-color: white;
    padding: 5%;
    border: 1px solid;
    border-color: black;
    border-radius: 3px;
    
}
</style>
