import './bootstrap';
import axios from 'axios';
import Alpine from 'alpinejs'

window.Alpine = Alpine
window.axios = axios;


Alpine.data('postManager', () => ({
    isEditing: false,

    form: {
        id: null,
        content: '',
        is_anonymous: false,
        is_letgo: false,
        visibility: 'public',
    },

    createPost() {
        this.form = {
            id: null,
            content: '',
            is_anonymous: false,
            is_letgo: false,
            visibility: 'public',
        },
            this.isEditing = false;
        post_modal.showModal();
    },

    async editPost(id) {
        try {
            const { data } = await axios.get(`/pawis/${id}/edit`);

            this.isEditing = true;
            this.form = data;

            post_modal.showModal();
        } catch (error) {
            console.error(error);
        }
    },
    moveToArchive(id) {
        this.form.id = id;

        move_to_archive.showModal();
    },

    moveToTrash(id){
        this.form.id = id;
        
        move_to_trash.showModal();
    }

}))


Alpine.start()


