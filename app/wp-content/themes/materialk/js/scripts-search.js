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
        $.getJSON(materialkData.root_url + '/wp-json/foodpalace/v1/search?keyword='+ this.searchInput.val() , (results) => { 
            console.log(results);
            this.searchResult.html(`
                <div class="row">
                    <div class="col s12 m4 l4">
                        <h3 class="flow-text center red-text">General Results:</h3>
                        <hr>
                        ${results.mainInfo.length ? `<div class="collection">` : `<p class="flow-text grey-text center" >No General Results</p>` }
                            ${results.mainInfo.map(item => `<a href="${item.url}" class="collection-item">${item.name} ${item.postType == 'post' ? `<small class="grey-text"> by ${item.authorName}`: ''}</small></a>`).join('')}
                        ${results.mainInfo.length ? `</div>` : '' }
                    </div>
                    <div class="col s12 m4 l4">
                        <h3 class="flow-text center red-text" >Recipes:</h3>
                        <hr>
                        ${results.recipes.length ? `<div class="collection">` : `<p class="flow-text grey-text center" ><em>No Recipes Results</em></p>` }
                            ${results.recipes.map(item => `<a href="${item.url}" class="collection-item">${item.name}</a>`).join('')}
                        ${results.recipes.length ? `</div>` : '' }
                        <h3 class="flow-text center red-text" >Chefs:</h3>
                        <hr>
                        ${results.chefs.length ? `<div class="collection">` : `<p class="flow-text grey-text center" ><em>No Chefs Results</em></p>` }
                            ${results.chefs.map(item => `<a href="${item.url}" class="collection-item"> ${item.name}</a>`).join('')}
                        ${results.chefs.length ? `</div>` : '' }
                    </div>
                    <div class="col s12 m4 l4">
                    <h3 class="flow-text center red-text" >Locations:</h3>
                    <hr>
                    ${results.locations.length ? `<div class="collection">` : `<p class="flow-text grey-text center"><em>No Locations Results</em></p>` }
                        ${results.locations.map(item => `<a href="${item.url}" class="collection-item">${item.name}</a>`).join('')}
                    ${results.locations.length ? `</div>` : '' }
                    <h3 class="flow-text center red-text">Events:</h3>
                    <hr>
                    ${results.events.length ? `<div class="collection">` : `<p class="flow-text grey-text center"><em>No Events Results</em></p>` }
                            ${results.events.map(item => `<a href="${item.url}" class="collection-item">${item.name}</a>`).join('')}
                    ${results.events.length ? `</div>` : '' }
                    </div>
                </div>
            `)
            this.isLoading = false;
        });
    
        //delete this after creation

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
