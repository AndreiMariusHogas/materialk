console.log('the search script is here');

class Search {
    //setup Object
    constructor(){
        this.addSearchBox();
        this.openButton = $('#searchTrigger');
        this.closeButton =$('#closeTrigger');
        this.searchBox = $('#searchBox');
        this.searchInput = $('#search');
        this.events();
        this.inputTimer;
        this.searchResult = $('#searchResults');
        this.previousValue;
        this.loader = `<div id="loadingIcon" class="preloader-wrapper active big">
                            <div class="spinner-layer spinner-red-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                            <div class="circle-clipper right">
                            <div class="circle">
                            </div>
                            </div>
                            </div>
                        </div>`;
        this.isLoading = false;
    }
    //events
    events(){
        this.openButton.on('click',this.openSearchBox.bind(this));
        this.closeButton.on('click',this.closeSearchBox.bind(this));
        this.searchInput.on('keyup',this.startSearch.bind(this));
    }
    //functions
    startSearch(){
        if(this.searchInput.val() != this.previousValue ){
            clearTimeout(this.inputTimer);
            if(this.searchInput.val()){
                if(!this.isLoading) {
                    this.searchResult.html(this.loader);
                    this.isLoading = true;
                }
                this.inputTimer = setTimeout(this.getResults.bind(this), 500);
                this.previousValue = this.searchInput.val();
            }else{
                this.searchResult.html('');
                this.isLoading = false;
            }
        }
    }
    getResults(){
        $.when(
            $.getJSON(materialkData.root_url + '/wp-json/wp/v2/posts?search='+ this.searchInput.val()),
            $.getJSON(materialkData.root_url + '/wp-json/wp/v2/pages?search='+ this.searchInput.val())
        ).then( (posts,pages ) => {
            let resultsArr = posts[0].concat(pages[0]);
                if(resultsArr.length > 0){
                    this.searchResult.html(`
                    <h3 class="flow-text center red-text" >Search Results:</h3>
                    <div class="collection">
                    ${resultsArr.map(item => `<a href="${item.link}" class="collection-item">${item['title']['rendered']} ${ item.type == 'post' ? `<small class="red-text">by ${item.authorName}</small>`: ''} </a>`).join('')}
                    </div>
                 `);
                 this.isLoading = false;
                }else{
                    this.searchResult.html('<h3 class="flow-text center red-text" ><em>Nothing found. Try again</em></h3>')
                    this.isLoading = false;
                }
        }, () => {
            this.searchResult.html('<h3 class="flow-text center red-text" ><em>Unexpected Error. Please try again</em></h3>')
        });
    }
    openSearchBox() {
        this.searchBox.css('display','block');
        $('body').css('overflow','hidden');
        this.searchInput.val('');
        this.searchResult.html('');
        setTimeout(() => this.searchInput.focus(),301);
    }
    closeSearchBox() {
        this.searchBox.css('display','none');
        $('body').css('overflow','scroll');
    }
    addSearchBox() {
        $('body').append(`
        <div id="searchBox">
        <div class="row">
            <div class="col s11 m11 l11">
                <label for="search"></label>
                <input type="text" name="search" id="search" placeholder="What are you looking for?">
            </div>
                <div class="col s1 m1 l1">
                    <i id="closeTrigger" class="fas fa-times-circle"></i>
                </div>
                </div>
            <div class="container">
                <div id="searchResults">
                </div>
            </div>
        </div>
        `);
    }
    
    }

let searchAll = new Search();
