export class User {
    id: number;
    name: string;
    phone: string;
    email: string
    status: string;
    profile_photo_url: string;
    created_at: string;

    constructor(obj: UserType) {
        Object.assign(this, obj);
    }
}

export interface UserType {
    id?: number;
    name: string;
    phone: string;
    email: string
    status: string;
}

export enum Status {
    Active = "active",
    Inactive = "inactive",
}

export function isStatus(value: any): value is Status {
    return Object.values(Status).includes(value);
}


