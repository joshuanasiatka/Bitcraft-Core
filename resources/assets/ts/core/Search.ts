import { IElement } from './IElement';

export default class Search implements IElement {

    private element : HTMLElement;
    private state : object;
    private returnable : object;

    constructor () {
        this.element = document.getElementsByClassName('search')[0];
        this.state = {};
    }
}
