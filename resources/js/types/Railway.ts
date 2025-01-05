export class Railway {
    id: number;
    name: string
    status: string

    constructor(obj: RailwayType) {
        Object.assign(this, obj)
    }
}

export interface RailwayType {
    id?: number
    name: string
    status: string
}

export enum Status {
    Active = "active",
    Maintenance = "maintenance",
    Inactive = "inactive",
}

export function isStatus(value: any): value is Status {
    return Object.values(Status).includes(value);
}
