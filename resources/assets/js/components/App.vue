<template>
    <div id="app">
        <div class="container">
            <header>
                <h1>Manter operadora</h1>
            </header>
            <hr />
            <div class="body">
                <div class="row">
                    <div class="select">
                        <label for="">Listar Operadora</label>
                        <select name="operadora">
                            <option value="">Todas</option>
                            <option value="Cielo">Cielo</option>
                            <option value="Mercado Pago">Mercado Pago</option>
                            <option value="Moderninha">Moderninha</option>
                        </select>
                    </div>
                    <div class="select">
                        <label for="status">Status</label>
                        <select name="status">
                            <option value="">Todos</option>
                            <option value="Cielo">Ativos</option>
                            <option value="Mercado Pago">Inativos</option>
                        </select>
                    </div>
                </div>
				<div class="row">
					<button @click="create">Novo</button>
				</div>
				<div class="row">
					<div class="checkBox">
						<input type="checkbox" name="marcarTodos">
						<label for="marcarTodos">Marcar todos</label>
					</div>
					<button @click="del">Excluir</button>
					<button @click="update">Habilitar e desabilitar</button>
				</div>
				<div class="table">
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Operadora</th>
								<th>Descri&ccedil;&atilde;o</th>
							</tr>
						</thead>
						<tbody>
							<operadora-component v-for="operadora in operadoras" v-bind:operadora="operadora" :key="operadora.id" @update="update" @delete="del"></operadora-component>
						</tbody>
					</table>
				</div>
            </div>            
        </div>
    </div>
</template>

<script>
	class Operadora {
		constructor({ id, operadora, descricao, status }) {
			this.id = id;
			this.operadora = operadora;
			this.descricao = descricao;
			this.status = status;
		}
	}

	import OperadoraComponent from "./OperadoraComponent.vue";

	export default {
  		data() {
			return {
	  			operadoras: [],
	  			mute: false,
			};
  		},
  		methods: {
			async create() {
	  			this.mute = true;
	  			const { data } = await window.axios.get("/api/operadoras/create");
	  			this.operadoras.push(new Operadora(data));
	  			this.mute = false;
			},
			async read() {
	  			this.mute = true;
	  			const { data } = await window.axios.get("/api/operadoras");
	  			console.log(data);
	  			data.forEach((operadora) =>	this.operadoras.push(new Operadora(operadora)));
	  			this.mute = false;
			},
			async update(id, status) {
	  			this.mute = true;
	  			await window.axios.put("/api/operadoras/${id}", { status });
	  			this.operadoras.find((operadora) => operadora.id === id).status = status;
	  			this.mute = false;
			},
			async del(id) {
	  			this.mute = true;
	  			await window.axios.delete("/api/operadoras/${id}");
	  			let index = this.operadoras.findIndex((operadora) => operadora.id === id);
	  			this.operadoras.splice(index, 1);
	  			this.mute = false;
			},
  		},
  		created() {
			this.read();
  		},
  		components: {
			OperadoraComponent,
  		},
  		watch: {
			mute(val) {
	  			document.getElementById("mute").className = val ? "on" : "";
			},
  		},
	};
</script>