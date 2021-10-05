--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `landingpage`
--
ALTER TABLE `landingpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-background-color`
--
ALTER TABLE `product-background-color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-background-image`
--
ALTER TABLE `product-background-image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-creator`
--
ALTER TABLE `product-creator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-cta`
--
ALTER TABLE `product-cta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-description`
--
ALTER TABLE `product-description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-faq`
--
ALTER TABLE `product-faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-feature-benefit`
--
ALTER TABLE `product-feature-benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-headline`
--
ALTER TABLE `product-headline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-image`
--
ALTER TABLE `product-image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-precta`
--
ALTER TABLE `product-precta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-preview`
--
ALTER TABLE `product-preview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-pricelist`
--
ALTER TABLE `product-pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-ps-disclaimer`
--
ALTER TABLE `product-ps-disclaimer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-satisfy`
--
ALTER TABLE `product-satisfy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-scarity`
--
ALTER TABLE `product-scarity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-subheadline`
--
ALTER TABLE `product-subheadline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-subheadline-detail`
--
ALTER TABLE `product-subheadline-detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `landingpage`
--
ALTER TABLE `landingpage`
  ADD CONSTRAINT `landingpage_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-background-color`
--
ALTER TABLE `product-background-color`
  ADD CONSTRAINT `product-background-color_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-background-image`
--
ALTER TABLE `product-background-image`
  ADD CONSTRAINT `product-background-image_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-creator`
--
ALTER TABLE `product-creator`
  ADD CONSTRAINT `product-creator_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-cta`
--
ALTER TABLE `product-cta`
  ADD CONSTRAINT `product-cta_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-description`
--
ALTER TABLE `product-description`
  ADD CONSTRAINT `product-description_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-faq`
--
ALTER TABLE `product-faq`
  ADD CONSTRAINT `product-faq_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-feature-benefit`
--
ALTER TABLE `product-feature-benefit`
  ADD CONSTRAINT `product-feature-benefit_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-headline`
--
ALTER TABLE `product-headline`
  ADD CONSTRAINT `product-headline_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-image`
--
ALTER TABLE `product-image`
  ADD CONSTRAINT `product-image_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-precta`
--
ALTER TABLE `product-precta`
  ADD CONSTRAINT `product-precta_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-preview`
--
ALTER TABLE `product-preview`
  ADD CONSTRAINT `product-preview_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-pricelist`
--
ALTER TABLE `product-pricelist`
  ADD CONSTRAINT `product-pricelist_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-ps-disclaimer`
--
ALTER TABLE `product-ps-disclaimer`
  ADD CONSTRAINT `product-ps-disclaimer_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-satisfy`
--
ALTER TABLE `product-satisfy`
  ADD CONSTRAINT `product-satisfy_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-scarity`
--
ALTER TABLE `product-scarity`
  ADD CONSTRAINT `product-scarity_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-subheadline`
--
ALTER TABLE `product-subheadline`
  ADD CONSTRAINT `product-subheadline_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-subheadline-detail`
--
ALTER TABLE `product-subheadline-detail`
  ADD CONSTRAINT `product-subheadline-detail_ibfk_1` FOREIGN KEY (`subheadline-id`) REFERENCES `product-subheadline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;