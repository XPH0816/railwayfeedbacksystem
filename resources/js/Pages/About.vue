<script setup>
import SectionCard from '@/Components/Home/SectionCard.vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
</script>

<template>
    <HomeLayout>
        <h2>About Us</h2>
        <SectionCard>
            <section class="about-section">
                <div class="about-content">
                    <h1>History</h1>
                    <p>
                        The history of the railway dates back to the early 19th century when the first steam-powered
                        locomotives were
                        developed. The introduction of railways revolutionized transportation, enabling faster and more
                        efficient
                        movement of goods and people. Over the years, railways have evolved with advancements in
                        technology, leading
                        to the development of high-speed trains and extensive rail networks that connect cities and
                        countries around
                        the world.
                    </p>
                    <p>
                        Railways have played a crucial role in the industrialization of many countries, facilitating the
                        movement of
                        raw materials to factories and finished goods to markets. They have also contributed to the
                        growth of cities
                        and the expansion of trade routes. Today, railways continue to be an essential part of the
                        global
                        transportation infrastructure, providing a sustainable and efficient means of travel and freight
                        transport.
                    </p>
                </div>
                <div class="about-image">
                    <img src="https://tse1.mm.bing.net/th?id=OIP.HxaKqLmvfNy7CpWe7vhCagHaEM&pid=Api&P=0&h=180"
                        alt="About Image 1" />
                </div>
            </section>
        </SectionCard>
        <SectionCard>
            <section class="about-section">
                <div class="about-image">
                    <video src="@/assets/videos/intro.mp4" autoplay></video>
                </div>
                <div class="about-content">
                    <h1>Our Vision</h1>
                    <p>
                        Our vision is to be the leading railway service provider in the region, offering a safe,
                        reliable, and
                        sustainable mode of transportation for passengers and freight. We aim to provide a seamless
                        travel experience
                        that exceeds the expectations of our customers and contributes to the economic and social
                        development of the
                        communities we serve.
                    </p>
                    <p>
                        We are committed to innovation and continuous improvement, leveraging the latest technologies
                        and best
                        practices to enhance our services and operations. Our goal is to create a modern and efficient
                        railway system
                        that is environmentally friendly and socially responsible, supporting the growth and prosperity
                        of our
                        region.
                    </p>
                </div>
            </section>
        </SectionCard>
        <SectionCard>
            <section class="about-section">
                <div class="about-content">
                    <h1>Our Values</h1>
                    <p>
                        Our railway system is built on the core values of safety, reliability, and sustainability. We
                        prioritize the
                        safety of our passengers and employees by adhering to strict safety protocols and continuously
                        improving our
                        infrastructure.
                    </p>
                    <p>
                        Reliability is at the heart of our operations, ensuring that our trains run on time and
                        provide a dependable service. Sustainability is a key focus, as we strive to minimize our
                        environmental impact
                        through the use of energy-efficient technologies and practices.
                    </p>
                    <p>
                        We are committed to providing a comfortable and enjoyable travel experience for our passengers,
                        with
                        state-of-the-art facilities and amenities on board. Our dedicated team of professionals works
                        tirelessly to
                        deliver exceptional service and maintain the highest standards of quality. At XYZ Railway, we
                        are proud to
                        uphold these values and continue to innovate and improve our services for the benefit of our
                        customers and
                        the environment.
                    </p>
                </div>
                <div class="about-image">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.geM5utLtuMy-vcUZ7ibs-AHaEK&pid=Api&P=0&h=180"
                        alt="About Image 3" />
                </div>
            </section>
        </SectionCard>
    </HomeLayout>
</template>

<style scoped>
h2 {
    text-align: center;
}

h1 {
    font-size: 2rem;
}

.about-section {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 30px;
}

.about-content {
    flex: 1;
    min-width: 300px;
}

.about-content p {
    line-height: 2.0;
    text-align: justify;
}

.about-image {
    flex: 1;
    min-width: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.about-image img,
.about-image video {
    width: auto;
    height: 50%;
    border-radius: 2%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    max-width: 100%;
}

.about-image video {
    width: 100%;
    height: auto;
}

@media screen and (max-width: 1024px) {
    .about-content:nth-child(odd) {
        order: 1;
    }

    .about-section {
        flex-direction: column;
        align-items: center;
    }

    .about-content,
    .about-image {
        min-width: 100%;
    }
}

@media screen and (max-width: 768px) {
    .about-content:nth-child(odd) {
        order: 1;
    }

    p {
        font-size: 1rem;
    }
}
</style>
