
const App = {
    data() {
        return {
            placeholderString: 'Введите название заметки',
            title: 'Список заметок',
            inputValue: '',
            notes: ['Заметка 1', 'Заметка 2', 'Заметка 122']
        }
    },
    methods: {
       
        addNewNote() {
            if(this.inputValue !== ''){
            this.notes.push(this.inputValue)
            this.inputValue = ''
            }
        },
        inputKeyPress(event) {
            if (event.key == 'Enter')
                this.addNewNote()

        },
        deleteNote(index ) {
            this.notes.splice(index,1)
        }
    },
    watch: {
        inputValue(value) {
            if (value.length > 10){
                this.inputValue =''
            }
        }
    }
}


Vue.createApp(App).mount('#app') 
