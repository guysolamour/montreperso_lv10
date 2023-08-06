@php
    $types       = \App\Models\Type::with(['forms', 'forms.index', 'forms.type', 'designs', 'designs.categories'])->get();
    // $forms       = \App\Models\Form::with(['media', 'index', 'index.media'])->get();
    $fonts       = \App\Models\Font::get();
    $bracelets       = \App\Models\Bracelet::get();
    $indicators  = \App\Models\Indicator::get();
    $backgrounds = \App\Models\Background::get();
@endphp

@push('css')
    <style>
        [x-cloak] { display: none !important; }
        .cp { cursor: pointer;}


        #designMontre [data-previsualisation="card"] {
            height: 300px;
        }
        #designMontre [data-previsualisation="box"] {
            position: relative; background-position: center; overflow: hidden; background-repeat: no-repeat;
        }

        #designMontre [data-previsualisation="box"] [data-texte="contenu"] {
             position: absolute; font-weight: 700;
        }
        /* HORLOGE */
        /* RONDE */

        /* MONTRE */
        /* RONDE */
        #designMontre [data-forme="ronde-montre"] [data-previsualisation="box"] {
            width: 250px; background-size: 250px;
        }
        #designMontre [data-forme="ronde-montre"] [data-image="forme"]{
            width: 250px;
        }
        #designMontre [data-forme="ronde-montre"] [data-image="index"]{
            width: 193px; position: absolute;left: 22px; top: 42px;
        }
        #designMontre [data-forme="ronde-montre"] [data-image="aiguille"]{
            width: 110px; height: 110px; position: absolute;left: 62px; top: 76px;
        }
        #designMontre [data-forme="ronde-montre"] [data-texte="contenu"] {
            width: 80%;
        }

        /* CARRE */
        #designMontre [data-forme="carre-montre"] [data-previsualisation="box"] {
            width: 300px; background-size: 300px;
        }
        #designMontre [data-forme="carre-montre"] [data-image="forme"]{
            width: 300px;
        }
        #designMontre [data-forme="carre-montre"] [data-image="index"]{
            width: 160px; position: absolute;left: 70px; top: 53px;
        }
        #designMontre [data-forme="carre-montre"] [data-image="aiguille"]{
            width: 110px; height: 110px; position: absolute;left: 95px; top: 76px;
        }
        #designMontre [data-forme="carre-montre"] [data-texte="contenu"] {
            width: 80%;
        }

        /* HORLOGE */
         /* RONDE */
         #designMontre [data-forme="ronde-horloge"] [data-previsualisation="box"] {
            width: 250px; background-size: 250px;
        }
        #designMontre [data-forme="ronde-horloge"] [data-image="forme"]{
            width: 250px;
        }
        #designMontre [data-forme="ronde-horloge"] [data-image="index"]{
            width: 233px; position: absolute;left: 15px; top: 10px;
        }
        #designMontre [data-forme="ronde-horloge"] [data-image="aiguille"]{
            width: 100px; height: 100px; position: absolute;left: 76px; top: 83px;
        }

        #designMontre [data-forme="ronde-horloge"] [data-texte="contenu"] {
            width: 80%;
        }

        /* CARRE */
        #designMontre [data-forme="carre-horloge"] [data-previsualisation="box"] {
            width: 300px; background-size: 300px;
        }
        #designMontre [data-forme="carre-horloge"] [data-image="forme"]{
            width: 300px;
        }
        #designMontre [data-forme="carre-horloge"] [data-image="index"]{
            width: 330px; position: absolute;left: -12px; top: -10px;
        }
        #designMontre [data-forme="carre-horloge"] [data-image="aiguille"]{
            width: 110px; height: 110px; position: absolute;left: 95px; top: 76px;
        }
        #designMontre [data-forme="carre-horloge"] [data-texte="contenu"] {
            width: 80%;
        }


        /* Trouver un moye dáppliquer ces styles uniquement sur les horloges */

        /* #designMontre [data-forme="carre"] [data-image="index"] {
            width: 330px;
            position: absolute;
            left: -12px;
            top: -10px;
        } */

        /* #designMontre [data-forme="ronde"] [data-image="index"] {
            width: 233px;
            position: absolute;
            left: 15px;
            top: 10px;
        } */
    </style>
@endpush

@push('js')
<script defer src="{{ asset('js/vendor/alpine.js') }}" ></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('buildwatch', () => ({

            data: {
                types: @json($types),
                fonts: @json($fonts),
                indicators: @json($indicators),
                bracelets: @json($bracelets),
                backgrounds: @json($backgrounds),

                connectedUser: @json(auth()->user() ?: []),

                adminEdit: @json($adminEdit ?? false),

                watch: @json($watch ?? []),

                currentStep: 0,

                formStep: 1,

                // editBackground: false,
                // addText: false,
                // steps: {
                //     first: 1,
                //     second: 2,
                //     third: 3,
                //     fourth: 4,
                // },

                // allowedForms: ['carre', 'ronde'],

                temporary: {
                    forms: [],
                    index: {
                        list: [],
                        images: [],
                    },
                    background: {
                        images: [],
                    },
                    design: {
                        list: [],
                        categories: []
                    }
                },

                form: {
                    type: {},
                    watch: {
                        name: '',
                        description: '',
                        bracelet: {
                            value: null,
                            model: {}
                        },
                        form: {
                            value: null,
                            model: {}
                        },
                        design: {
                            value: null,
                            model: {},
                            category: {
                                value: null,
                                model: {}
                            },
                        },
                        background: {
                            value: null,
                            model: {},
                            image: {
                                value: null,
                                model: {},
                                height: null,
                                positionX: null,
                                positionY: null,
                                previsualisation: null,
                            }
                        },
                        text: {
                            value: null,
                            font: null,
                            color: null,
                            size: 16,
                            positionX: 10,
                            positionY: 48,
                        },
                        indicator: {
                            value: null,
                            model: {},
                        },
                        index: {
                            value: null,
                            model: {},
                            image: {
                                value: null,
                                model: {},
                            }
                        },

                    },
                    login: {
                        email: '',
                        password: '',
                        error: "",
                        errors: {}
                    },
                    register: {
                        name: '',
                        phone_number: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                        error: {}
                    }
                }
            },
            resetView(){
                this.data.form.watch.bracelet.value = null
                this.data.form.watch.bracelet.model = {}


                this.data.form.watch.design.value = null
                this.data.form.watch.design.model = {}
                this.data.form.watch.design.category.value = null
                this.data.form.watch.design.category.model = {}
                // this.data.temporary.design.list = []
                // this.data.temporary.design.categories = []

                this.data.form.watch.background.value = null
                this.data.form.watch.background.model = {}
                this.data.form.watch.background.image.value = null
                this.data.form.watch.background.image.model = {}
                this.data.form.watch.background.image.height = null
                this.data.form.watch.background.image.positionX = null
                this.data.form.watch.background.image.positionY = null
                this.data.form.watch.background.image.previsualisation = null
                this.data.temporary.background.images = []

                this.data.form.watch.text.value     = null
                this.data.form.watch.text.font      = null
                this.data.form.watch.text.color     = null
                this.data.form.watch.text.size      = 16
                this.data.form.watch.text.positionX = 10
                this.data.form.watch.text.positionY = 48

                this.data.form.watch.indicator.value = null
                this.data.form.watch.indicator.model = {}

                this.data.form.watch.index.value = null
                this.data.form.watch.index.model = {}
                this.data.temporary.index.list   = []
                this.data.form.watch.index.image.value = null
                this.data.form.watch.index.image.model = {}
                this.data.temporary.index.images = []

                // this.changerPrevisualisationBackgroundImage("")
                this.data.form.watch.background.image.previsualisation = ''
            },
            init(){
                this.watch()

               if(this.editMode){
                    this.fillForm()
               }
            },
            watch(){
                this.$watch('data.form.watch.background.image.previsualisation', value => {
                        this.changerPrevisualisationBackgroundImage(value)
                })
            },
            fillForm(){
                this.$nextTick(() => {

                    // Il existe forcement un type
                    if (this.data.watch.form.type.id){
                        this.chooseType(this.data.watch.form.type.id)
                    }

                    if (this.data.watch.name){
                        this.data.form.watch.name = this.data.watch.name
                    }

                    if (this.data.watch.description){
                        this.data.form.watch.description = this.data.watch.description
                    }

                    if (this.data.watch.form.id != null){
                        this.data.form.watch.form.value = this.data.watch.form.id
                        this.chooseForm(this.data.watch.form.id)
                    }

                    if (this.data.watch.index.id != null){
                        this.data.form.watch.index.value = this.data.watch.index.id
                        this.chooseIndex(this.data.watch.index.id)

                        if (this.data.watch.index_image_id != null){
                            this.data.form.watch.index.image.value = this.data.watch.index_image_id
                            this.chooseIndexImage(this.data.watch.index_image_id)
                        }
                    }

                    if (this.data.watch.indicator.id != null){
                        this.data.form.watch.indicator.value = this.data.watch.indicator.id
                        this.chooseIndicator(this.data.watch.indicator.id)
                    }



                    if (this.data.watch.bracelet.id != null){
                        this.data.form.watch.bracelet.value = this.data.watch.bracelet.id
                        this.chooseBracelet(this.data.watch.bracelet.id)
                    }

                    if (this.data.watch.design.id != null){
                        this.data.form.watch.design.value = this.data.watch.design.id
                        this.chooseDesign(this.data.watch.design.id)
                    }

                    if (this.data.watch.designcategory.id != null){
                        this.data.form.watch.design.category.value = this.data.watch.designcategory.id
                        this.chooseDesignCategory(this.data.watch.designcategory.id)
                    }

                    if (this.data.watch.text != null){
                        this.data.form.watch.text = this.data.watch.text
                    }


                    if (this.data.watch.background != null){
                        this.data.form.watch.background.value = this.data.watch.background.id
                        this.chooseBackground(this.data.watch.background.id)

                        if (this.data.watch.background_image_id){
                            this.data.form.watch.background.image.value = this.data.watch.background_image_id
                            this.chooseBackgroundImage(this.data.watch.background_image_id)
                        }
                    }

                    if (this.data.watch.background_image.previsualisation != null){
                        this.data.form.watch.background.image.previsualisation = this.data.watch.background_image.previsualisation
                    }

                    if (this.data.watch.background_image.height != null){
                        this.data.form.watch.background.image.height = this.data.watch.background_image.height
                    }

                    if (this.data.watch.background_image.positionX != null){                        this.data.form.watch.background.image.positionX = this.data.watch.background_image.positionX
                    }
                    if (this.data.watch.background_image.positionY != null){
                        this.data.form.watch.background.image.positionY = this.data.watch.background_image.positionY
                    }
                })
            },
            chooseType(id){
                const type = this.data.types.find(item => item.id == id)

                this.data.form.type = type
                this.data.temporary.forms = type.forms
                this.data.temporary.design.list = type.designs

                this.changeStep(1)
            },
            isWatchType(){
                return this.data.form.type.slug == 'montre'
            },
            isHorlogeType(){
                return this.data.form.type.slug == 'horloge'
            },
            chooseDesign(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const design = this.data.temporary.design.list.find(item => item.id == id)

                if (!design){
                    this.data.form.watch.design.model = {}
                    return
                }

                this.data.form.watch.design.model = design
                this.data.temporary.design.categories = design.categories

            },
            chooseDesignCategory(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const category = this.data.temporary.design.categories.find(item => item.id == id)

                if (!category){
                    this.data.form.watch.design.category.model = {}
                    return
                }

                this.data.form.watch.design.category.model = category

            },
            chooseForm(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const form = this.data.temporary.forms.find(item => item.id == id)

                if (!form){
                    this.emptyFormulary()
                    this.data.form.watch.form.value = null
                    this.data.form.watch.form.model = {}
                    return
                }

                this.emptyFormulary()
                this.selectForm(form)

            },
            selectForm(form){
                this.addPrevisualisationStyle(form)

                this.data.form.watch.form.model = form
                this.data.temporary.index.list  = form.index
            },
            chooseBracelet(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const bracelet = this.data.bracelets.find(item => item.id == id)

                if (!bracelet){
                    this.data.form.watch.bracelet.model = {}
                    return
                }

                this.data.form.watch.bracelet.model = bracelet
            },
            chooseIndex(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const index = this.data.temporary.index.list.find(item => item.id == id)

                if (!index){
                    this.data.form.watch.index.model = {}
                    return
                }

                this.data.form.watch.index.model = index
                this.data.temporary.index.images = index.images
            },
            chooseIndexImage(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const image = this.data.temporary.index.images.find(item => item.id == id)

                if (!image){
                    this.data.form.watch.index.image.model = {}
                    return
                }

                this.data.form.watch.index.image.model = image
            },
            chooseIndicator(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const indicator = this.data.indicators.find(item => item.id == id)

                if (!indicator){
                    this.data.form.watch.indicator.model = {}
                    return
                }

                this.data.form.watch.indicator.model = indicator
            },
            chooseBackground(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const background = this.data.backgrounds.find(item => item.id == id)

                this.data.form.watch.background.image.model = {}
                this.data.form.watch.background.image.previsualisation = ''

                if (!background){
                    this.data.form.watch.background.model = {}
                    return
                }

                this.data.form.watch.background.model = background
                this.data.temporary.background.images = background.images
            },
            chooseBackgroundImage(event){
                const id  =  typeof event == 'object' && event !== null ? event.target.value : event

                const image = this.data.temporary.background.images.find(item => item.id == id)
                console.log(image);

                if (!image) {
                    this.data.form.watch.background.image.model = {}
                    this.data.form.watch.background.image.previsualisation = ''
                    return
                }

                this.data.form.watch.background.image.model = image
                this.data.form.watch.background.image.previsualisation = image.url
            },
            changerPrevisualisationBackgroundImage(path){
                // const backgroundImage = path && path.startsWith('url(') ? path : "url("+ path  +")"
                let backgroundImage

                if (path){
                    backgroundImage = path.startsWith('url(') ? path : "url("+ path  +")"
                }else {
                    backgroundImage = "url("+ path  +")"
                }

                this.$refs['previsualisationBox'].style.backgroundImage = backgroundImage
            },
            changeType(){

                if (!confirm('Etes vous sur de changer le type. Toutes les modifications seront perdues.')){
                    return
                }

                this.data.form.type = {}
                this.data.form.watch.form.value = null
                this.data.form.watch.form.model = {}



                this.resetView()

                // this.emptyFormulary()

                this.changeStep(0)

                // reinitialiser le formulaire
            },
            changeStep(step){
                this.data.currentStep = step
            },
            emptyFormulary(){

                this.data.form.watch.index.value = null
                this.data.form.watch.index.model = {}
                this.data.temporary.index.list   = []


                this.resetView()


                this.removePrevisualisationStyle()
            },
            handleWatchFormSubmit(event){
                if (!this.data.adminEdit){
                    if (!confirm('Avez vous terminé de personnaliser la montre')){
                        return
                    }
                }

                if (this.userIsNotAuthenticated() && !this.data.adminEdit){
                    this.showLoginForm()
                    return
                }

                this.saveWatch()
            },
            saveWatch(){

                const form = this.$refs['watchForm']

                if (!this.data.adminEdit){
                    this.appendDataToRequest(form, 'user_id', this.data.connectedUser.id)
                }

                this.appendDataToRequest(form, 'text', JSON.stringify(this.data.form.watch.text))

                this.appendDataToRequest(form, 'background_image', JSON.stringify({
                    height: this.data.form.watch.background.image.height,
                    positionX: this.data.form.watch.background.image.positionX,
                    positionY: this.data.form.watch.background.image.positionY,
                    previsualisation: this.data.form.watch.background.image.previsualisation,
                }))

                form.submit()
            },
            login(event){
                if (!this.isValidLoginForm){
                    return
                }


                const data = new FormData();
                data.append('_token', this.csrfToken);
                data.append('email', this.data.form.login.email);
                data.append('password', this.data.form.login.password);

                jQuery.ajax({
                    method: "POST",
                    processData: false,
                    contentType: false,
                    data,
                    url: this.loginFormUrl,
                    success: (data) => {
                        this.data.connectedUser = data
                        this.saveWatch()
                    },
                    error: (error) => {
                        this.data.form.login.error = true
                    }
                });
            },
            register(event){

            },
            userIsAuthenticated(){
                return this.data.connectedUser['id']
            },
            userIsNotAuthenticated(){
                return !this.userIsAuthenticated()
            },
            showWatchForm(){
                this.data.formStep = 1
            },
            showLoginForm(){
                this.data.formStep = 4
            },
            showRegisterForm(){
                this.data.formStep = 5
            },
            addPrevisualisationStyle(form){
                this.$refs.previsualisationCard.dataset['forme'] = form.name + '-' + form.type.name
                // this.$refs.previsualisationCard.dataset['forme'] = form.name
            },
            removePrevisualisationStyle(forme){
                delete this.$refs.previsualisationCard.dataset['forme']
            },
            reduceBackgroundImageHeight(){
                this.data.form.watch.background.image.height = this.getCurrentBackgroundImageSize() - 20
            },
            increaseBackgroundImageHeight(){
                this.data.form.watch.background.image.height = this.getCurrentBackgroundImageSize() + 20
            },
            moveBackgroundImageToTop(){
                this.data.form.watch.background.image.positionY = this.data.form.watch.background.image.positionY -= 2
            },
            moveBackgroundImageToBottom(){
                this.data.form.watch.background.image.positionY = this.data.form.watch.background.image.positionY += 2
            },
            moveBackgroundImageToLeft(){
                this.data.form.watch.background.image.positionX = this.data.form.watch.background.image.positionX -= 2
            },
            moveBackgroundImageToRight(){
                this.data.form.watch.background.image.positionX = this.data.form.watch.background.image.positionX += 2
            },
            moveTextToTop(){
                this.data.form.watch.text.positionY = this.data.form.watch.text.positionY -= 2
            },
            moveTextToBottom(){
                this.data.form.watch.text.positionY = this.data.form.watch.text.positionY += 2
            },
            moveTextToLeft(){
                this.data.form.watch.text.positionX = this.data.form.watch.text.positionX -= 2
            },
            moveTextToRight(){
                this.data.form.watch.text.positionX = this.data.form.watch.text.positionX += 2
            },
            getCurrentBackgroundImageSize(){
                return parseInt(window.getComputedStyle(this.$refs.previsualisationBox).backgroundSize.slice(0, -2), 10)
            },
            addCustomBackgroundImage(event){
                const form = event.target
                const file = form.files[0]

                if (!file){
                    return
                }

                if (file.type && !file.type.startsWith('image/')) {
                    alert('File is not an image.', file.type, file);
                    return;
                }

                const reader = new FileReader();

                reader.addEventListener('load', (ev) => {
                    this.data.form.watch.background.image.previsualisation = ev.target.result;

                    this.data.form.watch.background.image.value = null
                    this.data.form.watch.background.image.model = {}
                    this.data.form.watch.background.image.previsualisation = ev.target.result
                    form.value = ''
                });

                reader.readAsDataURL(file);
            },
            numberFormat (number, decimals, dec_point, thousands_sep) {
                // Strip all characters but numerical ones.
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            },
            formatPrice(price, suffix = 'F'){
                return this.numberFormat(price, 0, ',', ' ') + ' ' + suffix;
            },
            isValidEmail(email){
                let regex = new RegExp("([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\"\(\[\]!#-[^-~ \t]|(\\[\t -~]))+\")@([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*])");

                return regex.test(email);
            },
            isValidPassword(password){
                return password.length >= 8
            },
            appendDataToRequest(form, name, data){
                const input  = document.createElement('input')
                input.type   = 'hidden'
                input.name   = name
                input.value  = data
                form.appendChild(input)
            },
            get isValidLoginForm(){
                return this.isValidEmail(this.data.form.login.email) &&
                        this.isValidPassword(this.data.form.login.email)
            },
            get editMode(){
                return this.data.watch['id'] > 0
            },
            get disabledWatch(){
                return  !(this.data.form.watch.name.length > 0 ||
                        this.data.form.watch.description.length > 0 ||
                        this.data.form.watch.form.value > 0)
            },
            get watchFormUrl(){
                return this.$refs['watchForm'].getAttribute('action')
            },
            get loginFormUrl(){
                return this.$refs['loginForm'].getAttribute('action')
            },
            // get registerFormUrl(){
            //     return this.$refs['registerForm'].getAttribute('action')
            // },
            get csrfToken(){
                return document.querySelector('meta[name=csrf-token]').getAttribute('content')
            }
        }))
    })
</script>
@endpush
<div class="row" x-data="buildwatch" id="designMontre">
    <div class="col-md-12" x-cloak x-show="data.currentStep == 0">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Choisir le type de montre</h5>
                <hr>
                <div class="row">
                    <template x-for="type in data.types" key="type.id">
                        <div class="col-md-6">
                            <div class="card text-bg-light">
                                <div class="card-body text-center cp"  @click.prevent="chooseType(type.id)">
                                    <h5 class="card-title" x-text="type.name">Montre</h5>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" x-cloak x-show="data.currentStep == 1">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-secondary alert-dismissible fade show">
                    <h5 class="text-center">Type choisi: <span x-text='data.form.type.name'></span></h5>
                    <button @click="changeType" type="button" class="btn-close"></button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" x-show="data.formStep == 1">
                            <div class="card-body">

                                @if(isset($routes) && !empty($routes))
                                    @if(isset($watch) && $watch->getKey())
                                    <form @submit.prevent="handleWatchFormSubmit" action="{{ $routes['edit'] }}" method="post" id="watchForm" x-ref="watchForm">
                                        @method('PUT')
                                    @else
                                    <form @submit.prevent="handleWatchFormSubmit" action="{{ $routes['create'] }}" method="post" id="watchForm" x-ref="watchForm">
                                    @endif
                                @else
                                    @if(isset($watch) && $watch->getKey())
                                    <form @submit.prevent="handleWatchFormSubmit" action="{{ route('front.user.dashboard.watch.update', $watch) }}" method="post" id="watchForm" x-ref="watchForm">
                                        @method('PUT')
                                    @else
                                    <form @submit.prevent="handleWatchFormSubmit" action="{{ route('front.watch.store') }}" method="post" id="watchForm" x-ref="watchForm">
                                    @endif
                                @endif
                                    @csrf
                                   <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="watch[name]">Nom <span class="text-danger">*</span></label>
                                                <input name="name" x-model='data.form.watch.name' required type="text" id="watch[name]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="watch[description]">Description <span class="text-danger">*</span></label>
                                                <textarea name="description" x-model='data.form.watch.description' required  id="watch[description]" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <template x-if="data.adminEdit">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="watch[user]">Utilisateur</label>
                                                    <input  id="watch[user]" class="form-control" disabled :value="data.watch.user.name"></input>
                                                    <input type="hidden" :value="data.watch.user.id"></input>
                                                </div>
                                            </div>
                                        </template>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="watch[form_id]">Forme <span class="text-danger">*</span></label>
                                                        <select
                                                            name="form_id" x-model="data.form.watch.form.value"
                                                            id="watch[form_id]" class="form-control"
                                                            @change='chooseForm'
                                                        >
                                                        <option value="0">-------</option>
                                                            <template x-for="form in data.temporary.forms" :key="form.id">
                                                                <option :value="form.id" x-text="form.name"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col" x-show="data.temporary.index.list.length > 0" x-transition>
                                                    <div class="mb-3">
                                                        <label for="watch[index_id]">Cadre</label>
                                                        <select
                                                            x-model.number="data.form.watch.index.value" @change="chooseIndex"
                                                            name="index_id" id="watch[index_id]" class="form-control"
                                                        >
                                                            <option value="" >-------</option>
                                                            <template x-for="index in data.temporary.index.list" :key="index.id">
                                                                <option :value="index.id" x-text="index.name"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col" x-show="data.temporary.index.images.length > 0"  transition>
                                                    <div class="mb-3">
                                                        <label for="watch[index_image_id]">Image cadre</label>
                                                        <select
                                                            name="index_image_id"
                                                            x-model.number="data.form.watch.index.image.value" @change="chooseIndexImage"
                                                            class="form-control" id="watch[index_image_id]"
                                                            >
                                                            <option value="0">-------</option>
                                                            <template x-for="image in data.temporary.index.images" :key="image.id">
                                                                <option :value="image.id" x-text="image.name"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col" x-show='data.form.watch.index.image.value'>
                                                    <div class="mb-3">
                                                        <label for="watch[indicator_id]">Aiguille</label>
                                                        <select
                                                            name="indicator_id"
                                                            x-model.number="data.form.watch.indicator.value" @change="chooseIndicator"

                                                            class="form-control" id="watch[indicator_id]"
                                                        >
                                                            <option value="" >-------</option>
                                                            <template x-for="indicator in data.indicators" :key="indicator.id">
                                                                <option :value="indicator.id" x-text="indicator.name"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col" x-show="data.form.watch.form.value" x-transition>
                                                    <div class="mb-3">
                                                        <label for="watch[background_id]">Arrière plan</label>
                                                        <select
                                                            name="background_id"
                                                            x-model="data.form.watch.background.value"
                                                            id="watch[background_id]" class="form-control"
                                                            @change='chooseBackground'
                                                        >
                                                        <option value="0">-------</option>
                                                            <template x-for="background in data.backgrounds" :key="background.id">
                                                                <option :value="background.id" x-text="background.name"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col" x-show="data.temporary.background.images.length > 0" x-transition>
                                                    <div class="mb-3">
                                                        <label for="watch[background_image_id]">Arrière plan Image</label>
                                                        <select
                                                            name="background_image_id"
                                                            x-model="data.form.watch.background.image.value"
                                                            id="watch[watch[background_image_id]]" class="form-control"
                                                            @change='chooseBackgroundImage'
                                                        >
                                                        <option value="0">-------</option>
                                                            <template x-for="image in data.temporary.background.images" :key="image.id">
                                                                <option :value="image.id" x-text="image.name"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div  x-show="data.form.watch.form.value">
                                                <div class="mb-3">
                                                    <label for="watch[bracelet_id]">Couleur bracelet</label>
                                                    <p
                                                        x-show="data.form.watch.bracelet.model.id"
                                                        class="border"
                                                        :style="{
                                                            height:   '50px',
                                                            backgroundColor:     data.form.watch.bracelet.model.value,
                                                        }"
                                                    ></p>
                                                    <select
                                                        name="bracelet_id" x-model="data.form.watch.bracelet.value"
                                                        id="watch[bracelet_id]" class="form-control"
                                                        @change='chooseBracelet'
                                                    >
                                                    <option value="0">-------</option>
                                                        <template x-for="bracelet in data.bracelets" :key="bracelet.id">
                                                            <option :value="bracelet.id" x-text="bracelet.name"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                           <div class="row">
                                            <div class="col" x-show="data.form.type.id">
                                                <div class="mb-3">
                                                    <label for="watch[design_id]" >Design</label>
                                                    <select
                                                        x-model.number="data.form.watch.design.value" @change="chooseDesign"
                                                        name="design_id" id="watch[design_id]" class="form-control"
                                                    >
                                                        <option value="" >-------</option>
                                                        <template x-for="design in data.temporary.design.list" :key="design.id">
                                                            <option :value="design.id" x-text="design.name"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col" x-show="data.form.watch.design.value">
                                                <div class="mb-3">
                                                    <label for="watch[design_category_id]" x-text='isWatchType() ? "Qualité" : "Dimensions"'></label>
                                                    <select
                                                        x-model.number="data.form.watch.design.category.value" @change="chooseDesignCategory"
                                                        name="design_category_id" id="watch[design_category_id]" class="form-control"
                                                    >
                                                        <option value="" >-------</option>
                                                        <template x-for="category in data.temporary.design.categories" :key="category.id">
                                                            <option :value="category.id" x-text="category.name + ' - ' + formatPrice(category.price)"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                           </div>
                                        </div>
                                   </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a x-show='data.form.watch.form.value' @click.prevent='data.formStep = 2' href="#"  class="btn btn-secondary">Ajuster l'arrière plan</a>
                                    <a x-show='data.form.watch.form.value' href="#" @click.prevent='data.formStep = 3' class="btn btn-secondary">Ajouter du texte</a>
                                </div>
                            </div>
                        </div>
                        <div class="card" x-show='data.formStep == 2'>
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                  <li class="nav-item">
                                    <a @click.prevent="data.formStep = 1" class="nav-link active" aria-current="true" href="#"><- Retour</a>
                                  </li>
                                </ul>
                              </div>
                            <div class="card-body">
                                <div class="col text-center">
                                    <div class="mb-3">
                                        <label for="watch[form_id]">Ajouter une image</label>
                                        <input type="file" @input="addCustomBackgroundImage" class="form-control-file"  accept="image/*">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <label>Taille de l'arriere plan</label>
                                    <div>
                                        <button @click.prevent="reduceBackgroundImageHeight" type="button" class="btn btn-secondary" title="reduire"> - </button>
                                        <button @click.prevent="increaseBackgroundImageHeight" type="button" class="btn btn-primary" title="augmenter"> + </button>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <label>Position de l'arriere plan</label>
                                    <div>
                                        <button @click.prevent="moveBackgroundImageToTop" type="button" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"></path>
                                            </svg>
                                        </button>
                                        <button @click.prevent="moveBackgroundImageToBottom" type="button" class="btn btn-secondary" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>
                                                </svg>
                                        </button>
                                        <button @click.prevent="moveBackgroundImageToLeft" type="button" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
                                            </svg>

                                        </button>
                                        <button @click.prevent="moveBackgroundImageToRight" type="button" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" x-show='data.formStep == 3'>
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                  <li class="nav-item">
                                    <a @click.prevent="data.formStep = 1" class="nav-link active" aria-current="true" href="#"><- Retour</a>
                                  </li>
                                </ul>
                              </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Texte</label>
                                    <input
                                        :style="{
                                            fontSize:   data.form.watch.text.size + 'px',
                                            color:      data.form.watch.text.color,
                                            fontFamily: data.form.watch.text.font,
                                        }"
                                        x-model="data.form.watch.text.value" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Style de texte:</label>
                                    <select class="form-control" x-model="data.form.watch.text.font">
                                        <option value="0">----</option>
                                        <template x-for="font in data.fonts" :key='font.id'>
                                            <option :value="font.name" x-text="font.name"></option>
                                        </template>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Taille texte</label>
                                    <input type="number" min="1" x-model="data.form.watch.text.size" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Couleur du texte</label>
                                    <input type="color" x-model="data.form.watch.text.color" class="form-control">
                                </div>
                                <div class="text-center">
                                    <label>Position du texte</label> &nbsp;&nbsp;&nbsp;
                                <div class="mb-3">
                                    <button @click.prevent="moveTextToTop" type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"></path>
                                        </svg>
                                    </button>
                                    <button @click.prevent="moveTextToBottom" type="button" class="btn btn-secondary" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>
                                            </svg>
                                    </button>
                                    <button @click.prevent="moveTextToLeft" type="button" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
                                        </svg>

                                    </button>
                                    <button @click.prevent="moveTextToRight" type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                        </svg>

                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" x-show='data.formStep == 4'>
                            <div class="card-body">
                                <p class="alert alert-info">
                                    Merci de vous connecter afin de poursuivre votre personnalisation.
                                </p>
                                <p class="alert alert-danger" x-show="data.form.login.error">
                                    Email ou mot de passe incorrects
                                </p>
                                <form x-ref="loginForm"  action="{{ route('front.user.login') }}" method="post">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input x-model="data.form.login.email" type="text" :class="!isValidEmail(data.form.login.email) && 'is-invalid'" class="form-control">
                                        <div class="invalid-feedback">
                                            Email invalide
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Mot de passe</label>
                                        <input x-model="data.form.login.password" type="password" :class="!isValidPassword(data.form.login.password) && 'is-invalid'" class="form-control">
                                        <div class="invalid-feedback">
                                            Le mot de passe doit faire au moins 8 caractères
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">
                                        <button @click.prevent="showRegisterForm" type="button" class="btn btn-link">S'inscrire</button>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button @click.prevent="login" type="button" :disabled="!isValidLoginForm" class="btn btn-primary btn-block">Se connecter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card" x-show='data.formStep == 5'>
                            <div class="card-body">
                                Register form
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-warning text-center" x-show='data.form.watch.design.category.model.id'>
                            <strong x-text='formatPrice(data.form.watch.design.category.model.price)'></strong>
                            <p x-text='data.form.watch.design.category.model.description'></p>
                        </div>
                        <div class="text-center">
                            <div class="card">
                                <div class="card-body align-self-center" data-previsualisation="card" x-ref="previsualisationCard">
                                    <div
                                        data-previsualisation="box"
                                        x-ref="previsualisationBox"
                                        :style="{
                                            backgroundSize: data.form.watch.background.image.height + 'px',
                                            backgroundPositionX: data.form.watch.background.image.positionX + 'px',
                                            backgroundPositionY: data.form.watch.background.image.positionY + 'px',
                                        }"
                                        >
                                        <img
                                            data-image="forme"
                                            :src="data.form.watch.form.model.image"
                                            x-show="data.form.watch.form.model.id"
                                            >
                                        <img
                                            data-image="index"
                                            :src="data.form.watch.index.image.model.url"
                                            x-show="data.form.watch.index.image.model.id"
                                        >
                                        <img
                                            data-image="aiguille"
                                            :src="data.form.watch.indicator.model.image"
                                            x-show="data.form.watch.indicator.model.id"
                                        >

                                        <p
                                            style="margin-top: 40%;"  x-show="!data.form.watch.form.value">L'apercu de la montre s'affichera ici</p>
                                        <p
                                            data-texte="contenu"
                                            x-ref="textContenu"
                                            x-text='data.form.watch.text.value'
                                            :style="{
                                                fontSize:   data.form.watch.text.size + 'px',
                                                color:      data.form.watch.text.color,
                                                fontFamily: data.form.watch.text.font,
                                                left: data.form.watch.text.positionX + '%',
                                                top: data.form.watch.text.positionY + '%',
                                            }"
                                            ></p>
                                        </div>


                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button
                                            :disabled="disabledWatch"
                                            type="submit" class="btn btn-success" form="watchForm">
                                            <span x-show="!editMode">Enregistrer la montre</span>
                                            <span x-show="editMode">Modifier la montre</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-warning text-center mt-4" x-show='data.form.watch.design.category.model.id'>
                            <strong x-text='formatPrice(data.form.watch.design.category.model.price)'></strong>
                            <p  x-text='data.form.watch.design.category.model.description'></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
