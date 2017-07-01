import { IElement } from '../IElement';

export default class Sidebar implements IElement {

    element : HTMLElement;
    state   : object;

    constructor (state ?: object) {
        this.element = document.querySelector('aside');
        this.state   = state || {};
    }

    public changeSidebarDisplay (size) : void {
        size === 'full' ? this.element.classList.add('sidebar-full') : this.element.classList.remove('sidebar-full');
    }

}
