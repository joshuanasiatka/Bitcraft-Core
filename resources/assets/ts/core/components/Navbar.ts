import { IElement }             from '../IElement';
import { changeSidebarDisplay } from '../Action';

export default class Navbar implements IElement {

    element : HTMLElement;
    state   : object;

    constructor (state ?: object) {
        if (state === undefined) state = {};
        this.element = document.querySelector('nav');
        this.state = state;

        if (this.state.size === 'full') {
            // this.navbarResize();
        } else {
            this.state.size = 'default';
        }

        this.setClickableResize();
    }

    public navbarResize () : void {
        changeSidebarDisplay(this.state.size);
        this.state.size = (this.state.size === 'default' ? 'full' : 'default');
    }

    private setClickableResize () : void {
        // @NOTE: Click listener changes the context of the this keyword to the element clicked on.
        // Bind the this keyword to the context of this function
        this.element.children[1].addEventListener('click', this.navbarResize.bind(this), false);
    }

}
