import jquery from 'jquery';

export default class Sidebar {

    $ : Object;
    sidebar : Element;

    constructor () {
        this.$ = jquery;
        this.sidebar = document.querySelector('aside.sidebar');
    }



}
