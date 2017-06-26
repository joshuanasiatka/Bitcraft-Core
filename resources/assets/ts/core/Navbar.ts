import { IElement } from './IElement';

export default class Navbar implements IElement {

    private element : HTMLElement;
    private state   : object;

    constructor (state ?: object) {
        if (state === undefined) state = {};
        this.element = document.querySelector('nav');
        this.state = state;

        if (this.state.size) {
            this.navbarResize();
        } else {
            this.state.size = 'default';
        }

        this.setClickableResize();
    }

    public navbarResize () : void {
        if (this.state.size === 'full') {
            this.element.classList.remove('navbar-full-size');
            this.state.size = 'default';
        } else if (this.state.size === 'default') {
            this.state.size = 'full';
            this.element.classList.add('navbar-full-size');
        }

        return {

        };
    }

    private setClickableResize () : void {
        // @NOTE: Click listener changes the context of the this keyword to the element clicked on.
        // Bind the this keyword to the context of this function
        this.element.children[1].addEventListener('click', this.navbarResize.bind(this), false);
    }

}
