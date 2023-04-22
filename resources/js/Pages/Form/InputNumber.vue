<template>
	<div class="mt-2">
		<label>{{ title }}</label>
		<input
            :required=required	
			type="number"
			v-model="value"
			class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
		/>
		<p class="text-red-700 bg-yellow-400" v-if="error">{{ error }}</p>
	</div>
</template>

<script>
import { defineComponent } from "vue";
 
export default defineComponent({
	props: {
		title: String,
		modelValue: Number,
        options: String,
        required: Boolean,
		error: String,
		maskformat: String,
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
