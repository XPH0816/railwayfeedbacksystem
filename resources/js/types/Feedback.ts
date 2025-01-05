export class Feedback {
    id: number
    railway_id: number
    content: string
    reply: string

    constructor(obj: FeedbackType) {
        Object.assign(this, obj)
    }
}

export interface FeedbackType {
    id?: number
    railway_id: number
    content: string
    reply: string
}
