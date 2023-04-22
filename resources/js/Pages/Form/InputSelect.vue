<template>
	<div class="mt-2">
		<label>{{ title }}</label>
		<select
			:required=required	
			v-model="value"
			class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
		>
			<option v-for="item in itens" :value="item.id" :key="item.id">
				{{ item.name || item.title }}
			</option>
		</select>
	</div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
	props: {
		title: String,
		modelValue: String|Number,
		itens: Array,
		required: Boolean,
	},
	emits: ["update:modelValue"],
	computed: {
		value: {
			get() {
				return this.modelValue;
			},
			set(value) {
				this.$emit("update:modelValue", value);
			},
		},
	},
});
</script>
