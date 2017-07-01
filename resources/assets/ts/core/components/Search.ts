import { IElement } from '../IElement';

export default class Search implements IElement {

    element : HTMLElement;
    state   : object;

    constructor (state ?: object) {
        this.element = document.getElementsByClassName('search')[0];
        this.state = state || {};
    }
}
