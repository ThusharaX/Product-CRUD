<template>
  <div>
    <div class="text-center text-7xl font-bold mt-10">
      <h1>Products</h1>
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
              <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative"
              >
                <th
                  class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell"
                >
                  ID
                </th>
                <th
                  class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell"
                >
                  Image
                </th>
                <th
                  class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell"
                >
                  Name
                </th>
                <th
                  class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell"
                >
                  Price(LKR)
                </th>
                <th
                  class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell"
                >
                  Status
                </th>
              </tr>
            </thead>
            <tbody class="block md:table-row-group">
              <tr
                v-for="(product, index) in products"
                :key="index"
                class="bg-gray-300 border border-grey-500 md:border-none block md:table-row cursor-pointer"
              >
                <td
                  class="p-2 md:border md:border-grey-500 text-center block md:table-cell"
                >
                  <span class="inline-block w-1/3 md:hidden font-bold"
                    >name</span
                  >{{ product.id }}
                </td>

                <!-- Show image -->
                <td
                  class="p-2 md:border md:border-grey-500 text-center block md:table-cell"
                >
                  <img
                    :src="`${backendUrl}images/${product.image}`"
                    class="object-cover h-24 w-48 shadow-xl rounded-md"
                  />
                </td>

                <td
                  class="p-2 md:border md:border-grey-500 text-center block md:table-cell"
                >
                  <span class="inline-block w-1/3 md:hidden font-bold"
                    >name</span
                  >{{ product.name }}
                </td>

                <td
                  class="p-2 md:border md:border-grey-500 text-center block md:table-cell"
                >
                  <span class="inline-block w-1/3 md:hidden font-bold"
                    >price</span
                  >{{ product.price }}
                </td>

                <td
                  v-if="product.status == 'active'"
                  class="p-2 md:border md:border-grey-500 text-center block md:table-cell text-green-700 font-bold"
                >
                  <a
                    href="#"
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ product.status }}
                  </a>
                </td>

                <td
                  v-else
                  class="p-2 md:border md:border-grey-500 text-center block md:table-cell text-red-700 font-bold"
                >
                  <a
                    href="#"
                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                  >
                    {{ product.status }}
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'ProductPage',
  // layout: 'dashboard',
  data() {
    return {
      products: [],
      backendUrl: 'http://localhost:8000/',
    }
  },

  mounted() {
    this.fetchProducts()
  },

  methods: {
    async fetchProducts() {
      const response = await this.$axios.get(`${this.backendUrl}api/products`)
      this.products = response.data.products
    },
  },
})
</script>
