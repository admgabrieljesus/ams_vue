<template>
	<div id="carteira">
		<div id="validade">
			<p>Validade: {{ card.issue }}</p>
		</div>
		<div id="dados">
			<table>
				<tr>
					<td>{{ associate.code }}-{{ dependent.code }}</td>
					<td>{{ dependent.name }}</td>
				</tr>
				<tr>
					<td>P.D.:</td>
					<td>{{ kindship.title }}</td>
				</tr>
				<tr>
					<td>{{ associate.code }}</td>
					<td>{{ associate.name }}</td>
				</tr>
			</table>
		</div>
	</div>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
	components: {
		AppLayout,
		Head,
		Link,
	},
	props: {
		associate: Object,
		dependent: Object,
		kindship: Object,
		card: Object,
	},
});
</script>

<style>
 
    #carteira {
            background-image: url('/images/fundo-carteira.png');
            width: 1076px;
            height: 604px;
            margin: 20px 20px;
        }

        #validade {
            width: 422px;
            height: 63px;
            padding-top: 210px;
            padding-left: 612px;
        }

        #validade p {
            font-family: Arial;
            font-size: 30pt;
            color: #fff;
            font-weight: 400px;
        }

        #dados {
            width: 977px;
            height: 225px;
            padding-top: 110px;
            padding-left: 30px;
        }

        td {
            font-family: Arial;
            font-weight: 400px;
            font-size: 32pt;
            color: #fff;
            padding-left: 10px;
        }

</style>