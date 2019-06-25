import items from './data'

new Vue({
  el: '#app',
  data: {
    items: items
  },
  filters: {
    numberWithDelimiter (value) {
      if (!value) {
        return '0'
      } else {
        return value.toString().replace(/(\d)(?=(\d{3})+$)/g, '$1,')
      }
    }
  },
  methods: {
    doBuy () {
      alert(this.totalPriceWithTax + '円のお買い上げです')
      this.items.forEach((item) => item.quantity = 0)
    }
  },
  computed: {
    totalPrice () {
      return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0)
    },
    totalPriceWithTax () {
      return Math.floor(this.totalPrice * 1.08)
    },
    canBuy () {
      return this.totalPrice >= 1000
    },
    errorMessageStyle () {
      return {
        border: this.canBuy ? '' : '1px solid red',
        color: this.canBuy ? '' : 'red'
      }
    }
  }
})
